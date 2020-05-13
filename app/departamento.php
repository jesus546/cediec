<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';

    public function municipio()
    {
        return $this->hasMany('App\municipio');
    }
}
