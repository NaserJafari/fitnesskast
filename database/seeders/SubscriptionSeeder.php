<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subscriptions')->insert([
            [
                'name' => 'employee',
                'price' => 0.00,
            ],
            [
                'name' => 'gestopt',
                'price' => 0.00,
            ],
            [
                'name' => '1x per week',
                'price' => 4.99,
            ],
            [
                'name' => '2x per week',
                'price' => 9.99,
            ],
            [
                'name' => 'onbeperkt',
                'price' => 19.99,
            ],
            [
                'name' => 'onbeperkt + oneindig cursussen',
                'price' => 29.99,
            ]
        ]);
    }
}
