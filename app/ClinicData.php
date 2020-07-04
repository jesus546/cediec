<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicData extends Model
{
    public function user()
{
	return $this->belongsTo('App\User');
}

public function creator()
{
	return $this->belongsTo('App\User', 'created_by');
}

public function updater()
{
	return $this->belongsTo('App\User', 'updated_by');
}
}
