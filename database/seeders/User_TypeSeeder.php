<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class User_TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'type'  => 'superadmin', 
                'is_active' => 1,
                'user_id' =>1,
            ],
        ];

        DB::table('user_types')->insertOrIgnore($data);
    }
}
