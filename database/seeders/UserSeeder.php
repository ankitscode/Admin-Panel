<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */

    public function run()
    {
                User::firstOrCreate(['name' => 'Ramesh',
                'full_name' => 'Ramesh',
                'email' => 'Ramesh@gmail.com',
                'password' => Hash::make('!zeus@4047'),
                'is_active' => 1,
                'usertype'  => 2,
                'phone' => 9968920328,
                'birthdate' => '2020-11-30',
                'uuid' => 'c5dcce65-5b90-4dd7-af5d-6d7ce455dd6f']);

                User::firstOrCreate(['name' => 'Mukesh',
                'full_name' => 'Mukesh',
                'email' => 'mukesh@gmail.com',
                'password' => Hash::make('!zeus@4047'),
                'is_active' => 1,
                'usertype'  => 2,
                'phone' => 9969920328,
                'birthdate' => '2020-11-30',
                'uuid' => 'c5dcce66-5b90-4dd7-af5d-6d7ce455dd6f']);

                User::firstOrCreate(['name' => 'Suresh',
                'full_name' => 'Suresh',
                'email' => 'suresh@gmail.com',
                'password' => Hash::make('!zeus@4047'),
                'is_active' => 1,
                'usertype'  => 2,
                'phone' => 9970920328,
                'birthdate' => '2020-11-30',
                'uuid' => 'c5dcce67-5b90-4dd7-af5d-6d7ce455dd6f']);

                User::firstOrCreate(['name' => 'Mahesh',
                'full_name' => 'Mahesh',
                'email' => 'mahesh@gmail.com',
                'password' => Hash::make('!zeus@4047'),
                'is_active' => 1,
                'usertype'  => 2,
                'phone' => 9971920328,
                'birthdate' => '2020-11-30',
                'uuid' => 'c5dcce68-5b90-4dd7-af5d-6d7ce455dd6f']);
    
    }
}
