<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupoEtnico extends Model
{
    protected $table = 'grupoEtnico';
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
