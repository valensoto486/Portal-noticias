<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notices')->insert([
            'title' => 'Medellín respira más limpio: Nueva estrategia para reducir la contaminación del aire',
            'description' => 'La Alcaldía de Medellín presentó un ambicioso plan para mejorar la calidad del aire y reducir las emisiones contaminantes. Conozca las medidas que se implementarán para tener una ciudad más verde y saludable.',
            'content' => 'La Alcaldía de Medellín presentó un ambicioso plan para mejorar la calidad del aire y reducir las emisiones contaminantes. Conozca las medidas que se implementarán para tener una ciudad más verde y saludable.',
            'author' => 'Alcaldía de Medellín',
        ]);

        DB::table('notices')->insert([
            'title' => 'Medellín se expande: Nuevo proyecto de vivienda social beneficiará a miles de familias',
            'description' => 'La ciudad de la eterna primavera sigue creciendo. Un nuevo proyecto de vivienda social ofrecerá soluciones habitacionales a miles de familias, generando un impacto positivo en la calidad de vida de los ciudadanos.',
            'content' => 'La ciudad de la eterna primavera sigue creciendo. Un nuevo proyecto de vivienda social ofrecerá soluciones habitacionales a miles de familias, generando un impacto positivo en la calidad de vida de los ciudadanos.',
            'author' => 'Alcaldía de Medellín',
        ]);
    }
}
