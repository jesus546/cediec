<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\regime;

class aseguradora extends Model
{
    protected $table = 'aseguradora';


   public function user()
    {
        return $this->belongsTo('App\User');
    }

}
