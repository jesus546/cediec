<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic_cirugia extends Model
{
    protected $fillable = [
        'acompanate',
        'telefono',
        'parentezco',
        'H_i_v',
        'H_T_A',
        'tabaquismo',
        'alergias',
        'hepatitis',
        'cardiopatias',
        'diabetes',
        'MC',
        'E_E_A',
        'examen_fisico',
        'diagnostico',
        'conducta',
        'user_id',
         'created_by'
    ];
    
    public function user()
       {
         return $this->belongsTo('App\User');
      }

      public function creator()
      {
        return $this->belongsTo('App\User', 'created_by');
      }

      public function store($request, $usuario)
      {
       self::create([
        'acompanate'=> $request->acompanate,
        'telefono'=> $request->telefono,
        'parentezco'=> $request->parentezco,
        'H_i_v' => $request->H_i_v,
        'H_T_A'=> $request->H_T_A,
        'tabaquismo'=> $request->tabaquismo,
        'alergias'=> $request->alergias,
        'hepatitis'=> $request->hepatitis,
        'cardiopatias'=> $request->cardiopatias,
        'diabetes'=> $request->diabetes,
        'MC'=> $request->MC,
        'E_E_A'=> $request->E_E_A,
        'examen_fisico'=> $request->examen_fisico,
        'diagnostico'=> $request->diagnostico,
        'conducta'=> $request->conducta,
         'description' => $request->description,
         'user_id' => $usuario->id,
         'created_by' => $request->user()->id
       ]);
     }

     public function my_update($request)
    {
          return self::update([
            'acompanate'=> $request->acompanate,
            'telefono'=> $request->telefono,
            'parentezco'=> $request->parentezco,
            'H_i_v' => $request->H_i_v,
            'H_T_A'=> $request->H_T_A,
            'tabaquismo'=> $request->tabaquismo,
            'alergias'=> $request->alergias,
            'hepatitis'=> $request->hepatitis,
            'cardiopatias'=> $request->cardiopatias,
            'diabetes'=> $request->diabetes,
            'MC'=> $request->MC,
            'E_E_A'=> $request->E_E_A,
            'examen_fisico'=> $request->examen_fisico,
            'diagnostico'=> $request->diagnostico,
            'conducta'=> $request->conducta,
             'description' => $request->description,
          ]);
       }
}
