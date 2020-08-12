<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discapacidad extends Model
{
    protected $table = 'discapacidad';
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
