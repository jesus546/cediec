<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensaje extends Model
{
    protected $table = 'mensaje';
    protected $fillable = [
        'user_id', 'mensaje'
    ];
    
}
