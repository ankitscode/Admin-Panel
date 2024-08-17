<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
    
            $role = Role::create(['name' => 'Super Admin']);
            Log::info('Created Super Admin Role');
    
            $permissions = Permission::all();
            $role->givePermissionTo($permissions);
            Log::info('Assigned Permissions to Super Admin Role');
    
            $user = User::first();
            if ($user) {
                $user->assignRole($role);
                Log::info('Assigned Super Admin Role to User');
            } else {
                Log::warning('No User found to assign role');
            }
    
            Role::create(['name' => 'Manager']);
            Log::info('Created Manager Role');
    
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("##### RolesSeeder->run  #####". $e->getMessage());
        }

    }
}
