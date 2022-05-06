<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create(['marca'=>'HONDA']);
        Marca::create(['marca'=>'YAMAHA']);
        Marca::create(['marca'=>'LG']);
        Marca::create(['marca'=>'SANSUNG']);
        Marca::create(['marca'=>'HP']);
        Marca::create(['marca'=>'HIUNDAI']);
    }
}
