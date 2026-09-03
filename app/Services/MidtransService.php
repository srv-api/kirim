<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\CoreApi;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');

        Config::$isProduction = config('midtrans.is_production');

        Config::$isSanitized = true;
    }

    public function createQris(
        string $orderId,
        int $amount,
        $user,
        $plan
    ) {
        return CoreApi::charge([
            'payment_type' => 'qris',

            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],

            'item_details' => [
                [
                    'id' => (string) $plan->id,
                    'price' => $amount,
                    'quantity' => 1,
                    'name' => $plan->name,
                ],
            ],

            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],

            'qris' => [
                'acquirer' => 'gopay',
            ],
        ]);
    }
}