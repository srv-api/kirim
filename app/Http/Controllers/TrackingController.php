<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TrackingController extends Controller
{
    private $supportedCouriers = [
        'jne' => 'JNE',
        'pos' => 'POS Indonesia',
        'tiki' => 'TIKI',
        'jnt' => 'J&T Express',
        'sicepat' => 'SiCepat',
        'ninja' => 'Ninja Express',
        'lion' => 'Lion Parcel',
        'wahana' => 'Wahana Express',
        'spx' => 'SPX (Shopee Express)',
    ];

    public function search(Request $request)
    {
        $request->validate([
            'resi' => 'required|string|min:5|max:50',
            'courier' => 'required|string|in:' . implode(',', array_keys($this->supportedCouriers))
        ], [
            'resi.required' => 'Nomor resi wajib diisi!',
            'resi.min' => 'Nomor resi minimal 5 karakter!',
            'resi.max' => 'Nomor resi maksimal 50 karakter!',
            'courier.required' => 'Kurir wajib dipilih!',
            'courier.in' => 'Kurir yang dipilih tidak valid!'
        ]);

        $resi = strtoupper(trim($request->resi));
        $courier = strtolower(trim($request->courier));

        // Untuk SPX, biarkan saja dengan prefix-nya
        // Jangan di-remove karena API butuh prefix SPXID
        $awb = $resi;

        try {
            $apiKey = config('services.binderbyte.api_key', '52278afb9a998a6f72e40e057785be0e64ac83af026d46f661f0a995b7e639c2');
            $apiUrl = 'https://api.binderbyte.com/v1/track';

            $response = Http::timeout(30)->get($apiUrl, [
                'api_key' => $apiKey,
                'courier' => $courier,
                'awb' => $awb
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['status']) && $data['status'] == 200 && isset($data['data'])) {
                    
                    $trackingData = [
                        'resi' => $awb,
                        'status' => $this->mapStatus($data['data']['summary']['status'] ?? ''),
                        'status_raw' => $data['data']['summary']['status'] ?? '',
                        'courier' => $data['data']['summary']['courier'] ?? $this->supportedCouriers[$courier],
                        'date' => $data['data']['summary']['date'] ?? '',
                        'weight' => $data['data']['summary']['weight'] ?? '-',
                        'amount' => $data['data']['summary']['amount'] ?? '-',
                        'service' => $data['data']['summary']['service'] ?? '-',
                        'origin' => $data['data']['detail']['origin'] ?? '-',
                        'destination' => $data['data']['detail']['destination'] ?? '-',
                        'shipper' => $data['data']['detail']['shipper'] ?? '-',
                        'receiver' => $data['data']['detail']['receiver'] ?? '-',
                        'history' => $this->mapHistory($data['data']['history'] ?? []),
                    ];

                    return redirect()->route('home')->with('tracking', $trackingData);
                } else {
                    return redirect()->route('home')
                        ->withInput()
                        ->with('error', 'Data tidak ditemukan. Periksa kembali nomor resi Anda.');
                }

            } else {
                $statusCode = $response->status();
                return redirect()->route('home')
                    ->withInput()
                    ->with('error', 'Gagal mengambil data tracking (Error: ' . $statusCode . ')');
            }

        } catch (\Exception $e) {
            Log::error('Tracking Error', [
                'resi' => $resi,
                'message' => $e->getMessage()
            ]);

            return redirect()->route('home')
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
        }
    }

    private function mapStatus($status)
    {
        $statusMap = [
            'DELIVERED' => 'Selesai',
            'DELIVERY' => 'Sedang Dikirim',
            'PENDING' => 'Pending',
            'PICKUP' => 'Dijemput Kurir',
            'SORTING' => 'Di Sorting Center',
            'TRANSIT' => 'Dalam Perjalanan',
            'HOLD' => 'Ditahan',
            'RETURN' => 'Dikembalikan',
            'FAILED' => 'Gagal Dikirim',
            'ON PROCESS' => 'Dalam Proses',
            'ON_PROCESS' => 'Dalam Proses',
            'PROCESS' => 'Dalam Proses',
        ];

        return $statusMap[strtoupper($status)] ?? $status;
    }

    private function mapHistory($history)
    {
        $mapped = [];
        foreach ($history as $item) {
            if (!empty($item)) {
                $mapped[] = [
                    'date' => $item['date'] ?? '',
                    'desc' => $item['desc'] ?? '',
                    'location' => $item['location'] ?? '',
                ];
            }
        }
        return $mapped;
    }
}