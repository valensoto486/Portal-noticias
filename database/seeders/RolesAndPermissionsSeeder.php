<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Verificar si los permisos ya existen, y crearlos solo si no existen en la db
        $permissions = [
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts'
        ];

        foreach ($permissions as $permission) {
            // Crear el permiso solo si no existe
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles solo si no existen
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Asignar permisos a roles
        $admin->syncPermissions($permissions);
        $editor->syncPermissions(['create posts', 'edit posts', 'publish posts']);
        $user->syncPermissions(['create posts']);
    }
}
