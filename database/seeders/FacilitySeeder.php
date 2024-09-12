<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facilities')->insert([
            [
                'name' => 'Dans en meer',
                'subscription_id' => 5,
                'street' => 'Kerkstraat 1',
                'zipcode' => '1234 AB',
                'city' => 'Amsterdam',
            ],
            [
                'name' => 'Pilates',
                'subscription_id' => 5,
                'street' => 'Kaasstraat 2',
                'zipcode' => '2341 AB',
                'city' => 'Amsterdam',
            ],
            [
                'name' => 'Paaldansen',
                'subscription_id' => 5,
                'street' => 'Monkeystraat 3',
                'zipcode' => '3412 AB',
                'city' => 'Amsterdam',
            ]
        ]);
    }
}