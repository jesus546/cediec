<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class appointmet extends Model
{
    protected $fillable = [
        'dates', 'doctor_id', 'status', 'user_id'
    ];
   
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function store($request)
    {
        $dates = Carbon::createFromFormat('Y-m-d H:i', $request->date_submit .' '. $request->time_submit);
        return self::create([
            'dates' => $dates->toDateTimeString(),
            'doctor_id' => $request->doctor,
            'status' => 'pendiente',
            'user_id' => $request->user()->id,
           
        ]);
    }
}
