<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivelEducativo extends Model
{
    protected $table = 'nivelEducativo';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
