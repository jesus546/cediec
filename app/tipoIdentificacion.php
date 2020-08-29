<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoIdentificacion extends Model
{
    protected $table = 'TipoDeIdentificacion';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
