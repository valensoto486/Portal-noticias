<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Forum;  // Asegúrate de importar Forum aquí

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        // Usar el factory para generar 100 registros de notices (usando Forum)
        Forum::factory()->count(100)->create();
    }
}
