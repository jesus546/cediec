<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;



class appointments extends Model
{
    protected $fillable = [
        'dates', 'doctor_id', 'status', 'user_id', 'invoice_id'
    ];
    
    protected $dates = ['dates'];
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
   
   
    
    public function store($request, $invoice)
    {
       
        $date = Carbon::createFromFormat('Y/m/d H:i', $request->date_submit .' '. $request->time_submit);

        InvoiceMeta::create([
               'key' => 'doctor',
               'value' => $request->doctor,
               'invoice_id' => $invoice->id,
        ]);
        InvoiceMeta::create([
            'key' => 'concepto',
            'value' => 'cita medica',
            'invoice_id' => $invoice->id,
     ]);
        return self::create([
            'dates' => $date->toDateTimeString(),
            'doctor_id' => $request->doctor,
            'status' => 'pendiente',
            'user_id' => $invoice->user->id,
            'invoice_id' => $invoice->id,
           
        ]);
    }
    

    public function doctor()
    {
        $doctor = User::find($this->doctor_id);
        return $doctor;
    }

    public function my_update($request)
    {
        $date = Carbon::createFromFormat('Y/m/d H:i', $request->date_submit .' '. $request->time_submit);

        $invoice_status = ($request->status == 'terminada') ? 'aprobado' : $request->status;
        self::update([
            'dates' => $date->toDateTimeString(),
            'status' => $request->status,
            
        ]);

        $this->invoice->update([
           'status'=> $invoice_status
        ]);
    }
}
