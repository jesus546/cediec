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
        return $this->belongsToMany(Price::class)->withTimestamps();
   }
   public function users()
    {
        return $this->belongsTo('App\User');
    }
}
