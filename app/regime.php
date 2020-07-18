<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Price;
use App\aseguradora;

class regime extends Model
{
    protected $table = 'regimes';
    
    public function price()
   {
        return $this->belongsToMany(Price::class, 'price_insurance_regime')
        ->withPivot('aseguradora_id','regime_id')->withTimestamps();
   }


public function aseguradora()
   {
       return $this->belongsToMany(aseguradora::class, 'price_insurance_regime')
       ->withPivot('regime_id','aseguradora_id')->withTimestamps();
   }
}
