<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Define the roles and permissions to be seeded.
     *
     * @var array
     */
    private $roles = [
        'admin' => [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password123',
            'permissions' => ['manage users', 'manage products'],
        ],
        'user' => [
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => 'password123',
            'permissions' => ['manage products'],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // ✅ Create permissions before assigning them
        foreach ($this->roles as $roleName => $roleData) {
            foreach ($roleData['permissions'] as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
        }

        // ✅ Create roles and assign permissions
        foreach ($this->roles as $roleName => $roleData) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $permissions = Permission::whereIn('name', $roleData['permissions'])->get();
            $role->syncPermissions($permissions); // ✅ Use syncPermissions instead of givePermissionTo
        }

        // ✅ Create users and assign roles
        foreach ($this->roles as $roleName => $roleData) {
            $user = User::firstOrCreate(
                ['email' => $roleData['email']], // Ensure uniqueness
                [
                    'name' => $roleData['name'],
                    'password' => Hash::make($roleData['password']),
                ]
            );

            if (!$user->hasRole($roleName)) { // Prevent duplicate role assignment
                $user->assignRole($roleName);
            }
        }
    }
}
