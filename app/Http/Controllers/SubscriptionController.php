<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Menampilkan halaman checkout subscription.
     */
    public function checkout($slug)
    {
        $plan = SubscriptionPlan::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Harga normal
        $monthlyPrice = $plan->price;

        // Promo trial 100%
        $promotion = $monthlyPrice;

        // VAT 11%
        // Karena trial gratis, VAT hari ini = 0
        $vat = 0;

        // Total yang harus dibayar hari ini
        $dueToday = ($monthlyPrice - $promotion) + $vat;

        // Harga setelah trial
        $renewalPrice = $monthlyPrice;

        return view('subscription.checkout', [
            'plan'          => $plan,
            'monthlyPrice'  => $monthlyPrice,
            'promotion'     => $promotion,
            'vat'           => $vat,
            'dueToday'      => $dueToday,
            'renewalPrice'  => $renewalPrice,
        ]);
    }

    /**
     * Proses subscribe.
     */
    public function subscribe(Request $request, $slug)
    {
        $plan = SubscriptionPlan::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Validasi billing
        $validated = $request->validate([
            'country'      => ['required', 'string', 'max:100'],
            'address'      => ['required', 'string', 'max:255'],
            'city'         => ['required', 'string', 'max:100'],
            'postal_code'  => ['required', 'string', 'max:20'],
            'payment_type' => ['required', 'in:card,paypal'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Payment gateway bisa diproses di sini
        |--------------------------------------------------------------------------
        |
        | Contoh:
        | - Midtrans
        | - Xendit
        | - Stripe
        |
        */

        return redirect()
            ->route('subscription.checkout', $plan->slug)
            ->with('success', 'Subscription berhasil diproses.');
    }

    public function payment($plan)
{
    $plan = SubscriptionPlan::where('slug', $plan)
        ->where('is_active', true)
        ->firstOrFail();

    return view('subscription.payment', compact('plan'));
}
}

