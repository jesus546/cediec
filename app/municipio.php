<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $fillable = [
        'fk_departamento', 'nombre'
    ];
    protected $table = 'municipio';
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
