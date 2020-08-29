<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoAseguradora extends Model
{
    protected $table = 'tipoDeAseguradora';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}


