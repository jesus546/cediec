<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Price;
use App\regime;

class aseguradora extends Model
{
    protected $table = 'aseguradora';


   public function price()
   {
        return $this->belongsToMany(Price::class, 'price_insurance_regime' )
        ->withPivot('price_id','aseguradora_id')->withTimestamps();
   }

   public function regime()
   {
       return $this->belongsToMany(regime::class,'price_insurance_regime')
       ->withPivot('regime_id', 'aseguradora_id')->withTimestamps();
   }
}
