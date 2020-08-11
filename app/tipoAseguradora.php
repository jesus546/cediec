<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoAseguradora extends Model
{
    protected $table = 'tipoDeAseguradora';

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
}


