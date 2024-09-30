<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Permisos
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);

        // ROLES: admin, editor y usuario
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $user = Role::create(['name' => 'user']);

        // Asignar permisos a roles
        $admin->givePermissionTo(['create posts', 'edit posts', 'delete posts', 'publish posts']);
        $editor->givePermissionTo(['create posts', 'edit posts', 'publish posts']);
        $user->givePermissionTo('create posts');
    }
}
