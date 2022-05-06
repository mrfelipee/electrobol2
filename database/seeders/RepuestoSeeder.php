<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Repuesto;
use Laravel\Ui\Presets\React;

class RepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Repuesto::create(['nombre' => 'TECLADO',
            'marca'=>'LG',
            'serie'=>'456231',
            'stock'=>'50',
            'descripcion'=>'TECLADO COLOR NEGRO FUNCIONA CON 5 VOLTIOS'
        ]);
        Repuesto::create(['nombre' => 'TECLADO',
            'marca'=>'HP',
            'serie'=>'789456',
            'stock'=>'15',
            'descripcion'=>'TECLADO COLOR NEGRO FUNCIONA CON 5 VOLTIOS'
        ]);
        Repuesto::create(['nombre' => 'TECLADO',
            'marca'=>'TORBELLINO',
            'serie'=>'789456',
            'stock'=>'25',
            'descripcion'=>'TECLADO COLOR NEGRO FUNCIONA CON 5 VOLTIOS'
        ]);
        Repuesto::create(['nombre' => 'TECLADO',
            'marca'=>'SANTAPUE',
            'serie'=>'123456',
            'stock'=>'5',
            'descripcion'=>'TECLADO COLOR NEGRO FUNCIONA CON 5 VOLTIOS'
        ]);

        
    }
}
