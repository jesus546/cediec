<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivelEducativo extends Model
{
    protected $table = 'nivelEducativo';
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
