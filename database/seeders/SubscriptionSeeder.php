<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\subscription;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Subscription::firstOrCreate(['name' => 'Yearly', 'duration' => '1 year' ,'in_days'=>365,'amount' => 2999]);
            Subscription::firstOrCreate(['name' => 'Half yearly', 'duration' => '6 months','in_days'=>183,'amount' => 1599]);
            Subscription::firstOrCreate(['name' => 'Monthly', 'duration' => '1 month','in_days'=>28,'amount' => 299]);
         
    }
}
