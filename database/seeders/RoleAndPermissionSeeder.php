<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-game']);
        Permission::create(['name' => 'edit-game']);
        Permission::create(['name' => 'delete-game']);

        Permission::create(['name' => 'create-review']);
        Permission::create(['name' => 'delete-review']);

        Permission::create(['name' => 'create-comment']);
        Permission::create(['name' => 'delete-comment']);


        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-game',
            'edit-game',
            'delete-game',
            'create-review',
            'delete-review',
            'create-comment',
            'delete-comment',
        ]);

        $userRole->givePermissionTo([
            'create-review',
            'delete-review',
            'create-comment',
            'delete-comment',
        ]);
    }
}
