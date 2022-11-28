<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();

        try {
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'Admin',
                'role' => 'admin'
            ], $default_user_value));

            $test = User::create(array_merge([
                'email' => 'test@gmail.com',
                'name' => 'Test',
                'role' => 'user'
            ], $default_user_value));

            $role_admin = Role::create(['name' => 'admin']);
            $role_user = Role::create(['name' => 'user']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
            $permission = Permission::create(['name' => 'user role']);
            $permission = Permission::create(['name' => 'admin role']);

            $role_admin->givePermissionTo('read role', 'create role', 'update role', 'delete role', 'admin role');
            $role_user->givePermissionTo('user role');

            $admin->assignRole('admin');
            $test->assignRole('user');

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
