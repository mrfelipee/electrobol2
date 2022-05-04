<?php

namespace Database\Seeders;

use App\Models\Tipocontacto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipocontactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipocontacto::create(['tipo'=>'telefono']);
        Tipocontacto::create(['tipo'=>'Celular']);
        Tipocontacto::create(['tipo'=>'Whatsapp']);
        Tipocontacto::create(['tipo'=>'Correo']);
        Tipocontacto::create(['tipo'=>'Facebook']);
        Tipocontacto::create(['tipo'=>'Telegram']);
        
    }
}
