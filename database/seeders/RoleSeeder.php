<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'user'];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'guard_name' => 'web',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }

        $permissions = [
            'dashboard', 'create-bus', 'edit-bus', 'delete-bus',
            'manage-users',
        ];
        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission,
                'guard_name' => 'web',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }

        $role = Role::findByName('admin');
        $permissions = Permission::all()->pluck('name');
        foreach ($permissions as $permission) {
            $getPermission = Permission::findByName($permission);
            $role->givePermissionTo($getPermission);
        }
    }
}
