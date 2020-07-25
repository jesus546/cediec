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
        return $this->belongsToMany(Price::class )->withTimestamps();
   }

}
