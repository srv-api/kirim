<?php

namespace App\Console\Commands;

use App\Services\ZKTecoService;
use App\Models\Attendance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncAttendance extends Command
{
    protected $signature = 'zkteco:sync {--clear : Clear data di mesin setelah sinkron}';
    protected $description = 'Sinkronisasi data attendance dari mesin fingerprint';

    protected $zkService;

    public function __construct(ZKTecoService $zkService)
    {
        parent::__construct();
        $this->zkService = $zkService;
    }

    public function handle()
    {
        $this->info('Memulai sinkronisasi attendance...');

        $attendanceData = $this->zkService->getAttendance();

        if (empty($attendanceData)) {
            $this->error('Tidak ada data attendance atau gagal mengambil data');
            return 1;
        }

        $synced = 0;
        $skipped = 0;
        $bar = $this->output->createProgressBar(count($attendanceData));

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
                ]);
                $synced++;
            } else {
                $skipped++;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();

        if ($this->option('clear')) {
            $this->zkService->clearAttendance();
            $this->info('Data di mesin telah dibersihkan');
        }

        $this->info("Sinkronisasi selesai!");
        $this->table(
            ['Item', 'Jumlah'],
            [
                ['Data baru', $synced],
                ['Data duplikat', $skipped],
                ['Total', count($attendanceData)]
            ]
        );

        Log::info("Attendance sync completed. Synced: $synced, Skipped: $skipped");

        return 0;
    }
}