<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discapacidad extends Model
{
    protected $table = 'discapacidad';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
