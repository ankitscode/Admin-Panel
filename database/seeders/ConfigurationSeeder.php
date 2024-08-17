<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Configuration::firstOrCreate(['title' => 'currency','key'=>'currency','value'=>'','is_active'=>1]);
        Configuration::firstOrCreate(['title' => 'paymentMethod','key'=>'paymentMethod','value'=>'', 'is_active'=>1]);
        Configuration::firstOrCreate(['title' => 'store_timing','key'=>'store_timing','value'=>'', 'is_active'=>1]);
        Configuration::firstOrCreate(['title' => 'google_map_api_key','key'=>'google_map_api_key','value'=>'', 'is_active'=>1]);
        Configuration::firstOrCreate(['title' => 'product_location_radius','key'=>'product_location_radius','value'=>'', 'is_active'=>1]);
        Configuration::firstOrCreate(['title' => 'tax','key'=>'gst','value'=>'20', 'is_active'=>1]);
        
    }
}
