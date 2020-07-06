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


         $rh = [

            'A+',
            'B+',
            'O+',
            'AB+',
            'A-',
            'B-',
            'O-',
            'AB-',

 
         ];
 
         foreach ($rh as $key => $value){
             DB::table('RH')->insert([
                 'r' => $value
             ]);
         }

         $religion = [

            'Catolico',
            'Protestante',
            'Ortodoxa',
            'Budismo',
            'Islam',
            'Judaismo',
            'Hinduismo',
            'Cristianismo',
            'Teísmo',
            'No teístas',
            'Panteísmo',
            'Otro(a)'

 
         ];
 
         foreach ($religion as $key => $value){
             DB::table('religion')->insert([
                 'religion' => $value
             ]);
         }

         $GrupoEtnico = [

            'Sin pertenencia étnica ',
            'Negro',
            'Mulato',
            'Afrodescendiente',
            'Afrocolombiano',
            'Indigena',
            'Raizal',
            'Palenquero',
            'Gitano'

 
         ];
 
         foreach ($GrupoEtnico as $key => $value){
             DB::table('grupoEtnico')->insert([
                 'grupo' => $value
             ]);
         }

         $niveE = [

           
            'Preescolar',
            'Basica primaria',
            'Basica secundaria',
            'Educacion media',
            'Tecnico',
            'Tecnologo',
            'Tecnico Profesional',
            'Tecnologo Profesional',
            'Profesional',
            'Especializacion',
            'Maestria',
            'Doctorado'

 
         ];
 
         foreach ($niveE as $key => $value){
             DB::table('nivelEducativo')->insert([
                 'nivel' => $value
             ]);
         }

         
         
    }
}
