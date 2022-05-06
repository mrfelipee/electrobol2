<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipoarticulo;

class TipoarticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoarticulo::create(['tipoarticulo'=>'LAVADORA']);
        Tipoarticulo::create(['tipoarticulo'=>'HELADERA']);
        Tipoarticulo::create(['tipoarticulo'=>'TELEVISOR']);
        Tipoarticulo::create(['tipoarticulo'=>'LICUADORA']);
        Tipoarticulo::create(['tipoarticulo'=>'MICROHONDA']);
        Tipoarticulo::create(['tipoarticulo'=>'BATIDORA']);
    }
}
