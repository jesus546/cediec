<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\aseguradora;
use App\regime;
class price extends Model
{
    protected $fillable = [
        'precio'
   ];

   public function store($request)
    {
        return self::create($request->all());
    }
    public function my_update($request)
    {
        return self::update($request->all());
    }
   public function regime()
   {
       return $this->belongsToMany(regime::class,'price_insurance_regime')
       ->withPivot( 'price_id','regime_id')->withTimestamps();
   }

   public function aseguradora()
   {
       return $this->belongsToMany(aseguradora::class, 'price_insurance_regime' )
       ->withPivot('aseguradora_id','regime_id')->withTimestamps();
   }



    public function has_aseguradora($id)
    {
       foreach ($this->aseguradora as $asegurador) {
           if ($asegurador->pivot->aseguradora_id == $id ) return true;
       }
       return false;
    }

}
