<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
