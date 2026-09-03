<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\Transaction;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Notification;

class SubscriptionController extends Controller
{
    /**
     * Menampilkan daftar paket.
     */
    public function index()
    {
        $plans = SubscriptionPlan::where('is_active', true)
            ->orderBy('price')
            ->get();

        return view(
            'subscription.index',
            compact('plans')
        );
    }

    /**
     * Checkout paket.
     */
    public function checkout(string $slug)
    {
        $plan = SubscriptionPlan::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view(
            'subscription.checkout',
            compact('plan')
        );
    }

    /**
     * Membuat transaksi QRIS Midtrans.
     */
    public function subscribe(
        Request $request,
        string $slug,
        MidtransService $midtrans
    ) {
        $user = auth()->user();

        $plan = SubscriptionPlan::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI PAYMENT METHOD
        |--------------------------------------------------------------------------
        */

        $paymentMethod = $request->input('payment_method');

        if ($paymentMethod !== 'qris') {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Metode pembayaran tidak tersedia.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI HARGA
        |--------------------------------------------------------------------------
        */

        $amount = (int) round($plan->price);

        if ($amount <= 0) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Harga paket tidak valid.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | ORDER ID
        |--------------------------------------------------------------------------
        */

        $orderId =
            'SUB-' .
            now()->format('YmdHis') .
            '-' .
            strtoupper(Str::random(6));

        /*
        |--------------------------------------------------------------------------
        | SIMPAN TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $transaction = Transaction::create([
            'user_id' => $user->id,

            'subscription_plan_id' => $plan->id,

            'order_id' => $orderId,

            'gross_amount' => $amount,

            'payment_type' => 'qris',

            'transaction_status' => 'pending',

            'expired_at' => now()->addMinutes(15),
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | REQUEST KE MIDTRANS CORE API
            |--------------------------------------------------------------------------
            */

            $response = $midtrans->createQris(
                $orderId,
                $amount,
                $user,
                $plan
            );

            /*
            |--------------------------------------------------------------------------
            | CONVERT RESPONSE
            |--------------------------------------------------------------------------
            */

            $paymentData = json_decode(
                json_encode($response),
                true
            );

            /*
            |--------------------------------------------------------------------------
            | SIMPAN RESPONSE MIDTRANS
            |--------------------------------------------------------------------------
            */

            $transaction->update([
                'transaction_id' =>
                    $response->transaction_id ?? null,

                'transaction_status' =>
                    $response->transaction_status ?? 'pending',

                'fraud_status' =>
                    $response->fraud_status ?? null,

                'payment_data' =>
                    $paymentData,
            ]);

            /*
            |--------------------------------------------------------------------------
            | TRANSAKSI DITOLAK FDS
            |--------------------------------------------------------------------------
            */

            if (
                ($response->transaction_status ?? null)
                === 'deny'
            ) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Pembayaran QRIS ditolak oleh sistem keamanan Midtrans. Silakan coba kembali.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | TRANSAKSI EXPIRED
            |--------------------------------------------------------------------------
            */

            if (
                ($response->transaction_status ?? null)
                === 'expire'
            ) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Transaksi pembayaran sudah kedaluwarsa.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | TRANSAKSI CANCEL
            |--------------------------------------------------------------------------
            */

            if (
                ($response->transaction_status ?? null)
                === 'cancel'
            ) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Transaksi pembayaran dibatalkan.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | PENDING / SUCCESS
            |--------------------------------------------------------------------------
            */

        } catch (\Throwable $e) {

            report($e);

            $transaction->update([
                'transaction_status' => 'failed',

                'payment_data' => [
                    'error' => $e->getMessage(),
                ],
            ]);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal membuat pembayaran QRIS: ' .
                    $e->getMessage()
                );
        }

        /*
        |--------------------------------------------------------------------------
        | BUKA HALAMAN QRIS
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'subscription.qris',
            $transaction->id
        );
    }

    /**
     * Halaman QRIS.
     */
    public function qris(Transaction $transaction)
    {
        /*
        |--------------------------------------------------------------------------
        | SECURITY
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $transaction->user_id === auth()->id(),
            403
        );

        /*
        |--------------------------------------------------------------------------
        | JANGAN TAMPILKAN QR JIKA TRANSAKSI DITOLAK
        |--------------------------------------------------------------------------
        */

        if (
            $transaction->transaction_status === 'deny'
        ) {
            return redirect()
                ->route('subscription.checkout', [
                    'slug' => $transaction->plan->slug,
                ])
                ->with(
                    'error',
                    'Transaksi QRIS ditolak oleh Midtrans.'
                );
        }

        return view(
            'subscription.qris',
            compact('transaction')
        );
    }

    /**
     * Webhook / notification Midtrans.
     */
    public function notification(Request $request)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | BACA NOTIFICATION MIDTRANS
            |--------------------------------------------------------------------------
            */

            $notification = new Notification();

            $orderId =
                $notification->order_id;

            $transactionStatus =
                $notification->transaction_status;

            $fraudStatus =
                $notification->fraud_status ?? null;

            $transactionId =
                $notification->transaction_id ?? null;

            $paymentType =
                $notification->payment_type ?? null;

            $grossAmount =
                $notification->gross_amount;

            $statusCode =
                $notification->status_code;

            $signatureKey =
                $notification->signature_key;

            /*
            |--------------------------------------------------------------------------
            | VALIDASI SIGNATURE
            |--------------------------------------------------------------------------
            */

            $expectedSignature = hash(
                'sha512',
                $orderId .
                $statusCode .
                $grossAmount .
                config('midtrans.server_key')
            );

            if (
                !hash_equals(
                    $expectedSignature,
                    $signatureKey
                )
            ) {

                return response()->json([
                    'message' => 'Invalid signature',
                ], 403);
            }

            /*
            |--------------------------------------------------------------------------
            | CARI TRANSAKSI
            |--------------------------------------------------------------------------
            */

            $transaction = Transaction::where(
                'order_id',
                $orderId
            )->first();

            if (!$transaction) {

                return response()->json([
                    'message' => 'Transaction not found',
                ], 404);
            }

            /*
            |--------------------------------------------------------------------------
            | VALIDASI NOMINAL
            |--------------------------------------------------------------------------
            */

            if (
                (int) $transaction->gross_amount
                !==
                (int) $grossAmount
            ) {

                return response()->json([
                    'message' => 'Invalid amount',
                ], 400);
            }

            /*
            |--------------------------------------------------------------------------
            | SIMPAN STATUS
            |--------------------------------------------------------------------------
            */

            $transaction->update([
                'transaction_id' =>
                    $transactionId,

                'payment_type' =>
                    $paymentType,

                'transaction_status' =>
                    $transactionStatus,

                'fraud_status' =>
                    $fraudStatus,

                'payment_data' =>
                    json_decode(
                        json_encode($notification),
                        true
                    ),
            ]);

            /*
            |--------------------------------------------------------------------------
            | TRANSAKSI BERHASIL
            |--------------------------------------------------------------------------
            */

            if (
                $transactionStatus === 'settlement'
                ||
                (
                    $transactionStatus === 'capture'
                    &&
                    $fraudStatus !== 'challenge'
                )
            ) {

                DB::transaction(function () use (
                    $transaction
                ) {

                    /*
                    |--------------------------------------------------------------------------
                    | SET TRANSAKSI PAID
                    |--------------------------------------------------------------------------
                    */

                    $transaction->update([
                        'transaction_status' =>
                            'settlement',

                        'paid_at' =>
                            now(),
                    ]);

                    /*
                    |--------------------------------------------------------------------------
                    | CEK SUBSCRIPTION SUDAH ADA
                    |--------------------------------------------------------------------------
                    */

                    $existing =
                        Subscription::where(
                            'transaction_id',
                            $transaction->id
                        )->first();

                    if ($existing) {
                        return;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | AMBIL PLAN
                    |--------------------------------------------------------------------------
                    */

                    $plan =
                        $transaction->plan;

                    if (!$plan) {
                        throw new \RuntimeException(
                            'Subscription plan tidak ditemukan.'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | TANGGAL SUBSCRIPTION
                    |--------------------------------------------------------------------------
                    */

                    $startDate =
                        now();

                    $endDate =
                        $startDate
                            ->copy()
                            ->addDays(
                                $plan->duration_days
                            );

                    /*
                    |--------------------------------------------------------------------------
                    | BUAT SUBSCRIPTION
                    |--------------------------------------------------------------------------
                    */

                    Subscription::create([
                        'user_id' =>
                            $transaction->user_id,

                        'subscription_plan_id' =>
                            $transaction->subscription_plan_id,

                        'transaction_id' =>
                            $transaction->id,

                        'status' =>
                            'active',

                        'starts_at' =>
                            $startDate,

                        'ends_at' =>
                            $endDate,
                    ]);
                });
            }

            /*
            |--------------------------------------------------------------------------
            | DENY
            |--------------------------------------------------------------------------
            */

            if (
                $transactionStatus === 'deny'
            ) {

                $transaction->update([
                    'transaction_status' =>
                        'deny',

                    'fraud_status' =>
                        $fraudStatus ?? 'deny',
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | EXPIRE
            |--------------------------------------------------------------------------
            */

            if (
                $transactionStatus === 'expire'
            ) {

                $transaction->update([
                    'transaction_status' =>
                        'expire',
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | CANCEL
            |--------------------------------------------------------------------------
            */

            if (
                $transactionStatus === 'cancel'
            ) {

                $transaction->update([
                    'transaction_status' =>
                        'cancel',
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | RESPONSE KE MIDTRANS
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'message' => 'OK',
            ]);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'message' => 'Notification error',
            ], 500);
        }
    }
}