<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ClinicNote extends Model
{
  protected $fillable = [
    'date', 'description','description' ,'laboratorio' ,'plan_de_manejo' ,'conducta' , 'user_id', 'created_by'
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
        'date' => Carbon::now(),
        'description' => $request->description,
        'laboratorio' => $request->laboratorio,
        'plan_de_manejo' => $request->plan_de_manejo,
        'conducta' => $request->conducta,
        'user_id' => $usuario->id,
        'created_by' => $request->user()->id
      ]);
    }
    
    public function my_update($request)
    {
          self::update([
             'description' => $request->description,
             'laboratorio' => $request->laboratorio,
        'plan_de_manejo' => $request->plan_de_manejo,
        'conducta' => $request->conducta,
          ]);
       }
    }