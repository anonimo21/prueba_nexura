<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            [
                'nombre' => 'eder',
                'email' => 'eder@eder.com',
                'sexo' => 'M',
                'boletin' => 1,
                'descripcion' => 'descripcion',
                'area_id' => 1
            ],
            [
                'nombre' => 'luis',
                'email' => 'luis@luis.com',
                'sexo' => 'M',
                'boletin' => 0,
                'descripcion' => 'descripcion',
                'area_id' => 2
            ],
            [
                'nombre' => 'andrea',
                'email' => 'andrea@andrea.com',
                'sexo' => 'F',
                'boletin' => 1,
                'descripcion' => 'descripcion',
                'area_id' => 3
            ],
        ]);
    }
}
