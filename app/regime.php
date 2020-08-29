<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Price;
use App\aseguradora;

class regime extends Model
{
    protected $table = 'regimes';

   public function user()
    {
        return $this->belongsTo('App\User');
    }

  
}
