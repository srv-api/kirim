<?php

namespace App\Http\Controllers;

use App\Services\ZKTecoService;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class ZKTecoController extends Controller
{
    protected $zkService;

    public function __construct(ZKTecoService $zkService)
    {
        $this->zkService = $zkService;
    }

    public function testConnection()
    {
        if ($this->zkService->connect()) {
            $info = $this->zkService->getDeviceInfo();
            $this->zkService->disconnect();
            
            return response()->json([
                'success' => true,
                'message' => 'Koneksi berhasil',
                'data' => $info
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Koneksi gagal. Periksa IP dan port mesin.'
        ], 500);
    }

    public function syncAttendance()
    {
        $attendanceData = $this->zkService->getAttendance();
        
        if (empty($attendanceData)) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data attendance atau gagal mengambil data'
            ], 404);
        }

        $synced = 0;
        $skipped = 0;

        foreach ($attendanceData as $record) {
            $exists = Attendance::where('uid', $record['uid'] ?? null)
                ->where('timestamp', $record['timestamp'] ?? null)
                ->exists();

            if (!$exists && isset($record['timestamp'])) {
                Attendance::create([
                    'uid' => $record['uid'] ?? null,
                    'user_id' => $record['id'] ?? null,
                    'name' => $record['name'] ?? null,
                    'timestamp' => $record['timestamp'],
                    'type' => $record['type'] ?? null,
                    'status' => $record['status'] ?? null,
                    'verify_type' => $record['verify'] ?? null,
                    'work_code' => $record['work_code'] ?? null,
                ]);
                $synced++;
            } else {
                $skipped++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Sinkronisasi selesai",
            'data' => [
                'synced' => $synced,
                'skipped' => $skipped,
                'total' => count($attendanceData)
            ]
        ]);
    }

    public function getUsers()
    {
        $users = $this->zkService->getUsers();
        
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }


public function dashboard()
{
    $totalAttendance = Attendance::count();
    $todayAttendance = Attendance::whereDate('timestamp', today())->count();
    
    $isConnected = $this->zkService->connect();
    $deviceInfo = $isConnected ? $this->zkService->getDeviceInfo() : null;
    if ($isConnected) $this->zkService->disconnect();

    // Ambil attendance terakhir per user per hari
$attendances = Attendance::selectRaw('user_id, name, DATE(timestamp) as date, MIN(timestamp) as masuk, MAX(timestamp) as pulang')
    ->where('timestamp', '>=', now()->subDays(30)) // ambil 30 hari terakhir
    ->groupBy('user_id', 'name', 'date')
    ->orderBy('date', 'desc')
    ->get();

    return view('zkteco.dashboard', compact(
        'totalAttendance',
        'todayAttendance',
        'isConnected',
        'deviceInfo',
        'attendances'
    ));
}

    public function addUser(Request $request)
    {
        $request->validate([
            'uid' => 'required|integer',
            'userid' => 'required|string',
            'name' => 'required|string',
            'password' => 'nullable|string',
            'role' => 'nullable|integer'
        ]);

        $result = $this->zkService->addUser(
            $request->uid,
            $request->userid,
            $request->name,
            $request->password ?? '',
            $request->role ?? 0
        );

        return response()->json([
            'success' => $result,
            'message' => $result ? 'User berhasil ditambahkan' : 'Gagal menambahkan user'
        ]);
    }
}