<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = new Cargo();

        $cargo->nombre = 'Cliente';

        $cargo->save();
        
        //Cargo::truncate();

        
    }
}
