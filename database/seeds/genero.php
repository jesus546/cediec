<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genero extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
            'Masculino',
            'Femenino'
         ];
 
         foreach ($generos as $key => $value){
             DB::table('genero')->insert([
                 'gen' => $value
             ]);
         }
     }
}

