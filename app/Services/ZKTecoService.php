<?php
// app/Services/ZKTecoService.php

namespace App\Services;

use Jmrashed\Zkteco\Lib\ZKTeco;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ZKTecoService
{
    protected $zk;
    protected $ip;
    protected $port;
    protected $connected = false;
    protected $timeout = 30;
    protected $maxRetries = 3;

    public function __construct($ip = null, $port = null)
    {
        $this->ip = $ip ?? config('zkteco.ip', '192.168.1.201');
        $this->port = $port ?? config('zkteco.port', 4370);
        $this->timeout = config('zkteco.connection_timeout', 30);
        $this->maxRetries = config('zkteco.max_retries', 3);
        
        $this->zk = new ZKTeco($this->ip, $this->port);
    }

    /**
     * Connect ke mesin fingerprint dengan retry
     */
    public function connect()
    {
        if ($this->connected) {
            return true;
        }

        // Cek cache koneksi
        $cacheKey = 'zkteco_connection_' . $this->ip;
        if (Cache::has($cacheKey)) {
            Log::info("Menggunakan koneksi dari cache untuk {$this->ip}");
            $this->connected = true;
            return true;
        }

        for ($i = 1; $i <= $this->maxRetries; $i++) {
            try {
                Log::info("Mencoba koneksi ke {$this->ip}:{$this->port} (percobaan $i)");
                
                $this->connected = $this->zk->connect();
                
                if ($this->connected) {
                    // Dapatkan serial number untuk verifikasi
                    $serial = $this->zk->serialNumber();
                    
                    if ($serial) {
                        Log::info("Berhasil terhubung ke ZKTeco di {$this->ip}:{$this->port}, Serial: $serial");
                        
                        // Cache koneksi selama 5 menit
                        Cache::put($cacheKey, true, now()->addMinutes(5));
                        
                        return true;
                    }
                }
                
                Log::warning("Percobaan $i gagal, mencoba lagi dalam 2 detik...");
                sleep(2);
                
            } catch (\Exception $e) {
                Log::error("Error koneksi percobaan $i: " . $e->getMessage());
                
                if ($i < $this->maxRetries) {
                    sleep(2);
                }
            }
        }

        Log::error("Gagal terhubung ke ZKTeco setelah {$this->maxRetries} percobaan");
        return false;
    }

    /**
     * Disconnect dari mesin
     */
    public function disconnect()
    {
        if ($this->connected) {
            try {
                $this->zk->disconnect();
                Log::info("Disconnected dari ZKTeco");
            } catch (\Exception $e) {
                Log::warning("Error saat disconnect: " . $e->getMessage());
            }
            $this->connected = false;
            
            // Hapus cache koneksi
            Cache::forget('zkteco_connection_' . $this->ip);
        }
    }

    /**
     * Execute command dengan auto connect/disconnect
     */
    protected function executeCommand($callback, $errorMessage = 'Error executing command')
    {
        if (!$this->connect()) {
            throw new \Exception("Tidak dapat terhubung ke mesin fingerprint");
        }

        try {
            $result = $callback($this->zk);
            return $result;
        } catch (\Exception $e) {
            Log::error($errorMessage . ': ' . $e->getMessage());
            throw $e;
        } finally {
            $this->disconnect();
        }
    }

    /**
     * Daftarkan fingerprint untuk user - VERSI LENGKAP
     */
    public function enrollFingerprint($uid, $fingerId = 0, $userid = '', $name = '')
    {
        return $this->executeCommand(function($zk) use ($uid, $fingerId, $userid, $name) {
            
            // Enable device untuk enroll
            $zk->enableDevice();
            Log::info("Device enabled untuk enroll");
            
            // Cek apakah user sudah ada
            $users = $zk->getUser();
            $userExists = false;
            
            if (!empty($users)) {
                foreach ($users as $user) {
                    if (isset($user['uid']) && (int)$user['uid'] === (int)$uid) {
                        $userExists = true;
                        Log::info("User dengan UID $uid ditemukan: " . ($user['name'] ?? 'Unknown'));
                        break;
                    }
                }
            }
            
            // Jika user belum ada, tambah dulu
            if (!$userExists && !empty($userid) && !empty($name)) {
                Log::info("User UID:$uid belum ada, menambah user baru: $name");
                
                // Hapus user jika ada konflik
                try {
                    $zk->removeUser($uid);
                } catch (\Exception $e) {
                    // Abaikan error hapus
                }
                
                sleep(1);
                
                // Tambah user baru
                $added = $zk->setUser($uid, $userid, $name, '', 0);
                
                if (!$added) {
                    throw new \Exception("Gagal menambah user baru");
                }
                
                Log::info("User berhasil ditambahkan");
                sleep(2); // Jeda setelah tambah user
            }
            
            // Hapus fingerprint yang sudah ada di fingerId yang sama
            try {
                $existingFps = $zk->getFingerprint($uid);
                if (!empty($existingFps) && isset($existingFps[$fingerId])) {
                    Log::info("Fingerprint ID $fingerId untuk UID $uid sudah ada, menghapus...");
                    $zk->removeFingerprint($uid, $fingerId);
                    sleep(1);
                }
            } catch (\Exception $e) {
                Log::info("Method getFingerprint tidak tersedia atau error: " . $e->getMessage());
            }
            
            // Mulai proses enroll dengan berbagai method
            $enrollMethods = [
                'method1' => function() use ($zk, $uid, $fingerId) {
                    return $zk->enrollFingerprint($uid, $fingerId);
                },
                'method2' => function() use ($zk, $uid, $fingerId) {
                    return $zk->enrollFingerprint($uid, $fingerId, '');
                },
                'method3' => function() use ($zk, $uid, $fingerId) {
                    if (method_exists($zk, 'startEnroll')) {
                        return $zk->startEnroll($uid, $fingerId);
                    }
                    return false;
                }
            ];
            
            $enrollSuccess = false;
            $lastError = null;
            
            foreach ($enrollMethods as $methodName => $method) {
                try {
                    Log::info("Mencoba enroll dengan $methodName...");
                    $result = $method();
                    
                    if ($result) {
                        Log::info("Enroll berhasil dengan $methodName");
                        $enrollSuccess = true;
                        break;
                    }
                } catch (\Exception $e) {
                    $lastError = $e;
                    Log::info("Method $methodName gagal: " . $e->getMessage());
                    sleep(1);
                }
            }
            
            if (!$enrollSuccess) {
                // Coba method manual dengan delay lebih lama
                Log::info("Mencoba enroll dengan delay manual...");
                sleep(3);
                
                try {
                    // Beberapa mesin perlu perintah khusus
                    $zk->enrollFingerprint($uid, $fingerId);
                    sleep(2);
                    $enrollSuccess = true;
                } catch (\Exception $e) {
                    $lastError = $e;
                }
            }
            
            if (!$enrollSuccess) {
                throw new \Exception("Semua method enroll gagal: " . ($lastError ? $lastError->getMessage() : 'Unknown error'));
            }
            
            // Disable device setelah selesai
            try {
                $zk->disableDevice();
            } catch (\Exception $e) {
                // Abaikan error disable
            }
            
            // Verifikasi hasil enroll
            sleep(2);
            try {
                $fingerprints = $zk->getFingerprint($uid);
                if (!empty($fingerprints)) {
                    Log::info("Verifikasi berhasil: Fingerprint terdaftar");
                    return [
                        'success' => true,
                        'fingerprints' => $fingerprints,
                        'message' => 'Enroll berhasil'
                    ];
                }
            } catch (\Exception $e) {
                Log::info("Tidak dapat verifikasi fingerprint: " . $e->getMessage());
            }
            
            return [
                'success' => true,
                'message' => 'Proses enroll selesai, silakan verifikasi manual'
            ];
        }, 'Error enroll fingerprint');
    }

    /**
     * Get all users from device
     */
    public function getUsers()
    {
        return $this->executeCommand(function($zk) {
            $users = $zk->getUser();
            
            if (empty($users)) {
                return [];
            }
            
            // Format users
            $formattedUsers = [];
            foreach ($users as $user) {
                $formattedUsers[] = [
                    'uid' => $user['uid'] ?? 0,
                    'userid' => $user['userid'] ?? '',
                    'name' => $user['name'] ?? '',
                    'role' => $user['role'] ?? 0,
                    'password' => $user['password'] ?? '',
                    'cardno' => $user['cardno'] ?? ''
                ];
            }
            
            return $formattedUsers;
        }, 'Error getting users');
    }

    /**
     * Add user to device
     */
    public function addUser($uid, $userid, $name, $password = '', $role = 0)
    {
        return $this->executeCommand(function($zk) use ($uid, $userid, $name, $password, $role) {
            
            // Cek apakah user sudah ada
            $users = $zk->getUser();
            if (!empty($users)) {
                foreach ($users as $user) {
                    if (isset($user['uid']) && (int)$user['uid'] === (int)$uid) {
                        // User sudah ada, hapus dulu
                        $zk->removeUser($uid);
                        sleep(1);
                        break;
                    }
                }
            }
            
            return $zk->setUser($uid, $userid, $name, $password, $role);
            
        }, 'Error adding user');
    }

    /**
     * Update user
     */
    public function updateUser($oldUid, $newUid, $userid, $name, $password = '', $role = 0)
    {
        return $this->executeCommand(function($zk) use ($oldUid, $newUid, $userid, $name, $password, $role) {
            
            // Hapus user lama jika berbeda
            if ($oldUid != $newUid) {
                $zk->removeUser($oldUid);
                sleep(1);
            }
            
            // Cek apakah user baru sudah ada
            $users = $zk->getUser();
            if (!empty($users)) {
                foreach ($users as $user) {
                    if (isset($user['uid']) && (int)$user['uid'] === (int)$newUid && $oldUid != $newUid) {
                        $zk->removeUser($newUid);
                        sleep(1);
                        break;
                    }
                }
            }
            
            return $zk->setUser($newUid, $userid, $name, $password, $role);
            
        }, 'Error updating user');
    }

    /**
     * Delete user
     */
    public function deleteUser($uid)
    {
        return $this->executeCommand(function($zk) use ($uid) {
            return $zk->removeUser($uid);
        }, 'Error deleting user');
    }

    /**
     * Get fingerprint data
     */
    public function getFingerprint($uid)
    {
        return $this->executeCommand(function($zk) use ($uid) {
            try {
                $fingerprints = $zk->getFingerprint($uid);
                
                if (empty($fingerprints)) {
                    return [];
                }
                
                $result = [];
                foreach ($fingerprints as $fingerId => $data) {
                    $result[] = [
                        'finger_id' => $fingerId,
                        'size' => strlen($data) ?? 0,
                        'data' => base64_encode($data) // Encode untuk JSON
                    ];
                }
                
                return $result;
                
            } catch (\Exception $e) {
                Log::warning("Method getFingerprint tidak tersedia: " . $e->getMessage());
                return [];
            }
        }, 'Error getting fingerprint');
    }

    /**
     * Remove fingerprint
     */
    public function removeFingerprint($uid, $fingerId = null)
    {
        return $this->executeCommand(function($zk) use ($uid, $fingerId) {
            return $zk->removeFingerprint($uid, $fingerId);
        }, 'Error removing fingerprint');
    }

    /**
     * Get attendance data
     */
    public function getAttendance($limit = null)
    {
        return $this->executeCommand(function($zk) use ($limit) {
            
            if ($limit) {
                return $zk->getAttendanceWithLimit($limit);
            }
            
            return $zk->getAttendance();
            
        }, 'Error getting attendance');
    }

    /**
     * Clear attendance
     */
    public function clearAttendance()
    {
        return $this->executeCommand(function($zk) {
            return $zk->clearAttendance();
        }, 'Error clearing attendance');
    }

    /**
     * Get device info
     */
    public function getDeviceInfo()
    {
        return $this->executeCommand(function($zk) {
            
            return [
                'serial_number' => $zk->serialNumber(),
                'device_name' => $zk->deviceName(),
                'os_version' => $zk->osVersion(),
                'platform' => $zk->platform(),
                'firmware_version' => $zk->fmVersion(),
                'work_code' => $zk->workCode(),
                'ssr' => $zk->ssr(),
                'pin_width' => $zk->pinWidth(),
                'face_function' => $zk->faceFunctionOn(),
                'time' => $zk->getTime(),
                'ip' => $this->ip,
                'port' => $this->port
            ];
            
        }, 'Error getting device info');
    }

    /**
     * Set device time
     */
    public function setTime($timestamp = null)
    {
        return $this->executeCommand(function($zk) use ($timestamp) {
            
            if (!$timestamp) {
                $timestamp = time();
            }
            
            return $zk->setTime($timestamp);
            
        }, 'Error setting time');
    }

    /**
     * Get device time
     */
    public function getTime()
    {
        return $this->executeCommand(function($zk) {
            return $zk->getTime();
        }, 'Error getting time');
    }

    /**
     * Restart device
     */
    public function restart()
    {
        return $this->executeCommand(function($zk) {
            return $zk->restart();
        }, 'Error restarting device');
    }

    /**
     * Shutdown device
     */
    public function shutdown()
    {
        return $this->executeCommand(function($zk) {
            return $zk->shutdown();
        }, 'Error shutting down device');
    }

    /**
     * Open door
     */
    public function openDoor($delay = 1)
    {
        return $this->executeCommand(function($zk) use ($delay) {
            return $zk->openDoor($delay);
        }, 'Error opening door');
    }

    /**
     * Get device status
     */
    public function getStatus()
    {
        try {
            $connected = $this->connect();
            $this->disconnect();
            
            return [
                'connected' => $connected,
                'ip' => $this->ip,
                'port' => $this->port,
                'last_check' => now()->toDateTimeString()
            ];
            
        } catch (\Exception $e) {
            return [
                'connected' => false,
                'ip' => $this->ip,
                'port' => $this->port,
                'error' => $e->getMessage(),
                'last_check' => now()->toDateTimeString()
            ];
        }
    }

    /**
     * Get user count
     */
    public function getUserCount()
    {
        $users = $this->getUsers();
        return count($users);
    }

    /**
     * Get attendance count
     */
    public function getAttendanceCount()
    {
        $attendance = $this->getAttendance();
        return count($attendance);
    }

    /**
     * Clear all users
     */
    public function clearUsers()
    {
        return $this->executeCommand(function($zk) {
            return $zk->clearUsers();
        }, 'Error clearing users');
    }

    /**
     * Clear all admins
     */
    public function clearAdmin()
    {
        return $this->executeCommand(function($zk) {
            return $zk->clearAdmin();
        }, 'Error clearing admins');
    }

    /**
     * Set user role
     */
    public function setUserRole($uid, $role)
    {
        return $this->executeCommand(function($zk) use ($uid, $role) {
            
            // Dapatkan data user
            $users = $zk->getUser();
            $userData = null;
            
            foreach ($users as $user) {
                if (isset($user['uid']) && (int)$user['uid'] === (int)$uid) {
                    $userData = $user;
                    break;
                }
            }
            
            if (!$userData) {
                throw new \Exception("User dengan UID $uid tidak ditemukan");
            }
            
            // Hapus user lama
            $zk->removeUser($uid);
            sleep(1);
            
            // Tambah dengan role baru
            return $zk->setUser(
                $uid,
                $userData['userid'] ?? '',
                $userData['name'] ?? '',
                $userData['password'] ?? '',
                $role
            );
            
        }, 'Error setting user role');
    }
}