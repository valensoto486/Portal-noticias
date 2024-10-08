<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ejecuta el seeder de roles y permisos
        $this->call(RolesAndPermissionsSeeder::class);

        // Usuario de prueba
        $user = User::factory()->create([
            'name' => 'AlejoValen',
            'email' => 'admin2@gmail.com',
            'password' => '123456789',
        ]);

        // Asignar el rol "admin" al usuario
        $user->assignRole('admin');
    }
}
