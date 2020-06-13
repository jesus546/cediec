<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_tipoDeidentificacion',
        'identificacion',
        'nombres',
        'apellidos' , 
        'email',
        'direccion',
        'genero',
        'fk_departamento',
        'fk_municipio',
        'zona',
        'password', 
        'celular', 
        'fechaDeNacimiento',
    ];

  
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['fechaDeNacimiento'];

    public function age()
    {
        if (!is_null($this->fechaDeNacimiento)){
            $age = $this->fechaDeNacimiento->age;
            $years = ($age == 1) ?  'año' : 'años';
            $msj = $age . ' ' . $years;
        }else{
            $msj = 'indefinido';
        }
        return $msj;

    }
    

    
   
    public function setPasswordAttribute($value){
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function has_especiality($id)
    {
       foreach ($this->specialities as $speciality) {
           if ($speciality->id == $id ) return true;
       }
       return false;
    }
    

    public function tipoIdentificacion()
    {
        return $this->hasOne('App\tipoIdentificacion');
    }

   
    public function departamento()
    {
        return $this->hasOne('App\departamento');
    }

    public function municipio()
    {
        return $this->hasOne('App\municipio');
    }
    public function specialities()
    {
        return $this->belongsToMany('App\specialities')->withTimestamps();
    }
    public function appointments()
    {
        return $this->hasMany('App\appointments');
    }
}
