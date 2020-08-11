<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
