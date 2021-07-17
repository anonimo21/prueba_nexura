<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'nombre' => 'Profesional de proyectos- Desarrollador',
            ],
            [
                'nombre' => 'Gerente estrátegico',
            ],
            [
                'nombre' => 'Auxiliar administrativo',
            ]
        ]);
    }
}
