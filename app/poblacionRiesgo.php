<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poblacionRiesgo extends Model
{
    protected $table = 'poblacionRiesgo';
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
