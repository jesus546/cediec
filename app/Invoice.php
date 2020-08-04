<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'cantidad', 'status', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function appointments()
    {
        return $this->hasOne('App\appointments');
    }

    public function metas()
    {
  
        return $this->hasMany('App\InvoiceMeta');
 
    }

    public function price()
    {
        return $this->belongsTo('App\price');
    }
   
    public function store($request)
    {
        $user = User::findOrFail(decrypt($request->user_id));
        
        return self::create([
            'cantidad' => 500,
            'status' =>'pendiente',
            'user_id' => $user->id
           
        ]);
    }

    public function my_update($request)
    {
        self::update($request->all());
    }
    public function meta($key, $default = null)
    {
      $value = $this->metas->where('key',$key)->first();
      $value = (is_null($value)) ? $default : $value->value;
      return $value;
    }
    public function concept()
    {
       return $this->meta('concepto', 'Sin especificar');
    }
    public function doctor()
    {
       $user_id = $this->meta('doctor', 'Sin especificar');
       $user = User::findOrFail($user_id);
       return $user;
    }

    
}
