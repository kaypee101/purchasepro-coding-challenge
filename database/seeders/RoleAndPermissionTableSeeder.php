<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissionList = ['role', 'catalog', 'product'];
        $permissionType = ['list', 'create', 'edit', 'delete'];

        foreach ($permissionList as $permission) {
            foreach ($permissionType as $type) {
                Permission::create(['name' => $permission . '-' . $type]);
            }

            if ($permission == 'product') {
                Permission::create(['name' => $permission . '-' . 'checkout']);
            }
        }

        // * Assign permissions to ADMIN
        $adminRole = Role::create(['name' => 'admin']);
        $adminPermissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($adminPermissions);

        // * Assign permissions to USER
        $userRole = Role::create(['name' => 'user']);
        $userPermissions = Permission::where('name', 'product-list')->orWhere('name', 'product-checkout')->pluck('id', 'id');
        $userRole->syncPermissions($userPermissions);
    }
}
