<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role_id' => 1,
            ],
            [
                'name' => 'coach',
                'email' => 'coach@gmail.com',
                'password' => Hash::make('coach'),
                'role_id' => 2,
            ],
            [
                'name' => 'sporter',
                'email' => 'sporter@gmail.com',
                'password' => Hash::make('sporter'),
                'role_id' => 3,
            ],
        ]);
    }
}
