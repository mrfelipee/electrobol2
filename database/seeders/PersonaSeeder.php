<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create(['nombre'=>'LUIS',
                        'apellidos'=>'MALDONADO FLORES',
                        'direccion'=>'CALLE 13 OESTE VILLA 1 DE MAYO',
                        'carnet'=>'4561231 BN']);

        Persona::create(['nombre'=>'ENRIQUE',
                        'apellidos'=>'MOCHO HEAMARA',
                        'direccion'=>'PLAN 3000 AV PURITO',
                        'carnet'=>'7897878 LP']);
                        
        Persona::create(['nombre'=>'FELIPE',
                        'apellidos'=>'MACHACA MAMANI',
                        'direccion'=>'TRES PASOS AL FRENTE',
                        'carnet'=>'789456 SC']);

        Persona::create(['nombre'=>'DEBORAH',
                        'apellidos'=>'RODRIGUEZ ROJAS',
                        'direccion'=>'CALLE ARENASLES LOS POZOZ',
                        'carnet'=>'9874987 PN']);

        Persona::create(['nombre'=>'CARLOS',
                        'apellidos'=>'TEMO QUINTANA',
                        'direccion'=>'LA GUARDIA CALLE SANTA CRUZ',
                        'carnet'=>'7894545 SC']);
    }
}
