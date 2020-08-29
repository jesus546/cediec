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
   
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
   
   
    
    public function store($request)
    {
       
        $date = Carbon::createFromFormat('Y/m/d H:i', $request->date_submit .' '. $request->time_submit);
        
        $user = User::findOrFail(decrypt($request->user_id));

        
        return self::create([
            'dates' => $date->toDateTimeString(),
            'doctor_id' => $request->doctor,
            'status' => 'pendiente',
            'user_id' => $user->id,
           
        ]);
    }
    

    public function doctor()
    {
        $doctor = User::find($this->doctor_id);
        return $doctor;
    }

    public function user_id()
    {
        $user = User::find($this->user_id);
        return $user;
    }

    public function my_update($request)
    {
        $date = Carbon::createFromFormat('Y/m/d H:i', $request->date_submit .' '. $request->time_submit);

     
        self::update([
            'dates' => $date->toDateTimeString(),
            'status' => $request->status,
            
        ]);

     
    }
}
