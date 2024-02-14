<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission1 = Permission::create(['name'=>'view role']);
        $permission2 = Permission::create(['name'=>'create role']);
        $permission3 = Permission::create(['name'=>'edit role']);
        $permission4 = Permission::create(['name'=>'delete role']);
        
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'buyer']);
        Role::create(['name'=>'seller']);

        $role = Role::findByName('admin');
        $role->givePermissionTo([
            $permission1,
            $permission2,
            $permission3,
            $permission4
        ]);
    }
}
