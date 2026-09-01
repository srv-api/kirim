<?php

namespace App\Http\Controllers;

use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function create(Request $request, MidtransService $midtrans)
    {
        $orderId = 'ORDER-' . strtoupper(Str::random(10));

        $amount = 99000;

        $params = [
            'payment_type' => 'bank_transfer',

            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],

            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        $response = $midtrans->charge($params);

        return response()->json([
            'success' => true,
            'order_id' => $orderId,
            'payment' => $response,
        ]);
    }

public function notification()
{
    $notification = new Notification();

    $orderId = $notification->order_id;
    $transactionStatus = $notification->transaction_status;
    $fraudStatus = $notification->fraud_status;

    // Cari transaksi
    $transaction = Transaction::where(
        'order_id',
        $orderId
    )->first();

    if (!$transaction) {
        return response()->json([
            'message' => 'Transaction not found'
        ], 404);
    }

    if (
        $transactionStatus === 'settlement'
        && $fraudStatus === 'accept'
    ) {

        $transaction->update([
            'status' => 'paid',
        ]);

        // Aktifkan subscription di sini
    }

    elseif ($transactionStatus === 'pending') {

        $transaction->update([
            'status' => 'pending',
        ]);

    }

    elseif (
        in_array($transactionStatus, [
            'cancel',
            'deny',
            'expire',
        ])
    ) {

        $transaction->update([
            'status' => 'failed',
        ]);
    }

    return response()->json([
        'success' => true
    ]);
}
}