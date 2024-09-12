<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'name' => 'Yoga',
                'description' => 'Yoga is goed voor de geest en het lichaam.',
                'max_spot' => 30,
            ],
            [
                'name' => 'Pilates',
                'description' => 'Pilates is goed voor de geest en het lichaam.',
                'max_spot' => 20,
            ],
            [
                'name' => 'Paaldansen',
                'description' => 'Paaldansen is leuk en gezellig.',
                'max_spot' => 10,
            ],
        ]);
    }
}
