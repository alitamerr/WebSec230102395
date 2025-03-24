<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Creating roles
        $adminRole = Role::create(['name' => 'admin']);
        $employeeRole = Role::create(['name' => 'employee']);

        // Creating permissions
        $createUserPermission = Permission::create(['name' => 'create user']);
        
        // Assigning permission to the admin role
        $adminRole->givePermissionTo($createUserPermission);

        // Other permissions and roles can be added here
    }
}
