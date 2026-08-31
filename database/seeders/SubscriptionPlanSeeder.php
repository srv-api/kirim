<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        SubscriptionPlan::updateOrCreate(
            [
                'slug' => 'plus',
            ],
            [
                'name' => 'Think Plus',
                'description' => 'Plus monthly subscription',
                'price' => 124000,
                'trial_days' => 30,
                'is_active' => true,
            ]
        );
    }
}

