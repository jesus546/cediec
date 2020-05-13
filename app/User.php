<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_tipoDeidentificacion',
        'id',
        'nombres',
        'apellidos' , 
        'email',
        'direccion',
        'fk_genero',
        'fk_departamento',
        'fk_municipio',
        'fk_zona',
        'password', 
        'celular', 
        'fechaDeNacimiento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipoIdentificacion()
    {
        return $this->hasOne('App\tipoIdentificacion');
    }
    public function genero()
    {
        return $this->hasOne('App\genero');
    }
    public function zona()
    {
        return $this->hasOne('App\zona');
    }
    public function departamento()
    {
        return $this->hasOne('App\departamento');
    }
    public function municipio()
    {
        return $this->hasOne('App\municipio');
    }

}
