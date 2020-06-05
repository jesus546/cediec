<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialities extends Model
{
    protected $fillable = [
         'name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function store($request)
    {
        return self::create($request->all());
    }
}
