<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rh extends Model
{
    protected $table = 'RH';

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
