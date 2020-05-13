<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class zona extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zonas = [
            'Urbana',
            'Rural'
         ];
 
         foreach ($zonas as $key => $value){
             DB::table('zona')->insert([
                 'zona' => $value
             ]);
         }
    }
}
