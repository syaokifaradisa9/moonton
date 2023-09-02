<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $subscriptionPlan = [
            [
                'name' => 'Basic',
                'price' => 200000,
                'active_period_in_month' => 3,
                'features' => json_encode(['feature1', 'feature2'])
            ],
            [
                'name' => 'Premium',
                'price' => 800000,
                'active_period_in_month' => 6,
                'features' => json_encode(['feature1', 'feature2', 'feature3', 'feature4'])
            ]
        ];

        SubscriptionPlan::insert($subscriptionPlan);
    }
}
