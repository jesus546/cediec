<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class identificacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDeIdentificacions = [

            'Cédula De Ciudadania',
            'Tarjeta De Identidad',
            'Cedula De Extranjeria',
            'Registro Civil',
            'Numero Nacional De Identificacion'
 
         ];
 
         foreach ($tipoDeIdentificacions as $key => $value){
             DB::table('tipoDeIdentificacion')->insert([
                 'tipo' => $value
             ]);
         }
    }
}
