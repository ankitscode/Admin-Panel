<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LockupType::class);
        $this->call(Lockup::class);
        $this->call(PermissionSeeder::class);
        $this->call(DefaultAdminSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(User_TypeSeeder::class);
        // $this->call(ConfigurationSeeder::class);
        // $this->call(SubscriptionSeeder::class);
        $this->call(CategoriesSeeder::class);
        // $this->call(ProductSeeder::class);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
