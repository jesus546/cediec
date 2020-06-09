<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;



class appointments extends Model
{
    protected $fillable = [
        'dates', 'doctor_id', 'status', 'user_id'
    ];
    
    protected $dates = ['dates'];
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function store($request)
    {
        $date = Carbon::createFromFormat('Y/m/d H:i', $request->date_submit .' '. $request->time_submit);
        return self::create([
            'dates' => $date->toDateTimeString(),
            'doctor_id' => $request->doctor,
            'status' => 'pendiente',
            'user_id' => $request->user()->id,
           
        ]);
    }

    public function doctor()
    {
        $doctor = User::find($this->doctor_id);
        return $doctor;
    }
}
