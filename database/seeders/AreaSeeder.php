<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
                'nombre' => 'Administración',
            ],
            [
                'nombre' => 'Contabilidad',
            ],
            [
                'nombre' => 'Sistemas',
            ],
            [
                'nombre' => 'RH',
            ],
        ]);
    }
}
