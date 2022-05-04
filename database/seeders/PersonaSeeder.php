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
        Persona::create(['nombre'=>'luis',
                        'apellidos'=>'maldo',
                        'direccion'=>'la villa',
                        'carnet'=>'123']);

        Persona::create(['nombre'=>'luis',
                        'apellidos'=>'nado',
                        'direccion'=>'el plan',
                        'carnet'=>'1234']);
                        
        Persona::create(['nombre'=>'felipe',
                        'apellidos'=>'maldo',
                        'direccion'=>'tres pasos',
                        'carnet'=>'12345']);

        Persona::create(['nombre'=>'felipe',
                        'apellidos'=>'nado',
                        'direccion'=>'el centro',
                        'carnet'=>'123456']);

        Persona::create(['nombre'=>'carlos',
                        'apellidos'=>'toyama',
                        'direccion'=>'la guardia',
                        'carnet'=>'1234567']);
    }
}
