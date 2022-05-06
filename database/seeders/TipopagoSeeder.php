<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipopago;

class TipopagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipopago::create(['tipopago'=>'EFECTIVO']);
        Tipopago::create(['tipopago'=>'TRANSFEREMCIA']);
        Tipopago::create(['tipopago'=>'TARJETA']);
        Tipopago::create(['tipopago'=>'QR']);
        Tipopago::create(['tipopago'=>'TIGO MONEY']);
    }
}
