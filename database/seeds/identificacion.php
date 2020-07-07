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

         $dis= [

           
            'Discapacidad Auditiva',
            'Discapacidad Física',
            'Discapacidad Intelectual',
            'Discapacidad Multiple',
            'Discapacidad Psicosocial',
            'Discapacidad Visual',
            'Sordoceguera',

         ];
 
         foreach ($dis as $key => $value){
             DB::table('discapacidad')->insert([
                 'discapacidad' => $value
             ]);
         }

         $Tasegu= [

           
            'EPS',
            'EPSI',
            'ISS',

         ];
 
         foreach ($Tasegu as $key => $value){
             DB::table('tipoDeAseguradora')->insert([
                 'tipoAsegu' => $value
             ]);
         }

         $asegu= [

           
            'Salud Colmena E.P.S.',
            'Salud Total E.P.S.',
            'Cafesalud E.P.S. ',
            'E.P.S.  Sanitas',
            'Compensar  E.P.S.',
            'EPS Prog. Comfenalco Antioquia	',
            'SuSalud EPS - (Suramericana)',
            'Colseguros E.P.S',
            'Comfenalco Valle E.P.S.',
            'E.P.S.  Saludcoop',
            'Humana Vivir  S.A.  E.P.S.',
            'EPS Servicios Medicos Colpatria',
            'Coomeva E.P.S.',
            'E.P.S. Famisanar CAFAM-COLSUBSIDIO',
            'E.P.S Servicio Occidental de Salud ',
            'Cruz Blanca E.P.S. S.A',
            'Solsalud S.A. EPS',
            'SALUDVIDA S.A. EPS',
            'SALUDCOLOMBIA EPS S.A.',
            'RED SALUD ATENCION HUMANA EPS S.A.',
            'Mutual SER EPS',
            'COMPARTA EPS'
         ];
 
         foreach ($asegu as $key => $value){
             DB::table('aseguradora')->insert([
                 'asegu' => $value
             ]);
         }
        
         $pR= [

           
            'DESPLAZADO',
            'DESPLAZADO CABEZA FAMILIA',


         ];
 
         foreach ($pR as $key => $value){
             DB::table('poblacionRiesgo')->insert([
                 'poblaRies' => $value
             ]);
         }


         
         
    }
}
