<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Traits\HasRoles;
use App\rh;
use App\appointments;

class User extends Authenticatable implements MustVerifyEmail
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
        'telefono',
        'email',
        'direccion',
        'genero',
        'zona',
        'password', 
        'celular', 
        'fechaDeNacimiento',
        'ocupacion',
        'nombre_del_responsable',
        'telefono_r',
        'fk_parentezco',
        'fk_estadoCivil',
        'fk_rH',
        'fk_religion',
        'fk_discapacidad',
        'fk_nivelEducativo',
        'fk_grupoEtnico',
        'fk_departamento',
        'fk_municipio',
        'fk_tipoAseguradora',
        'fk_aseguradora',
        'fk_poblacionRiesgo',
        'fk_regime'
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
            $msj = 'Indefinido';
        }
        return $msj;

    }
    

    
   
    public function setPasswordAttribute($value){
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
    public function store_empl($request)
    {
        $empleados = self::create($request->all());
        $roles= [$request->roles];
        $empleados->syncRoles($roles);
        Alert::success('EXITO', 'se ha creado su usuario')->showConfirmButton('OK', '#3085d6');
        return $empleados;
    }

    public function store_user($request)
    {
        $usuarios = self::create($request->all());
        $usuarios->assignRole('User');
        Alert::success('EXITO', 'se ha creado su usuario')->showConfirmButton('OK', '#3085d6');
        return $usuarios;
    }

    public function update_user($request)
    {
        $usuario = self::update($request->all());

        return $usuario;
    }


    public function has_especiality($id)
    {
       foreach ($this->specialities as $speciality) {
           if ($speciality->id == $id ) return true;
       }
       return false;
    }

    public function regime()
   {
       return $this->belongsToMany(regime::class);
   }
   public function rh()
   {
       return $this->hasOne(rh::class);
   }

   public function aseguradora()
   {
       return $this->belongsToMany(aseguradora::class);
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
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
    public function appointments()
    {
        return $this->hasMany('App\appointments');
    }
    public function clinic_datas()
    {
    return $this->hasMany('App\ClinicData');
    }
    
   public function clinic_data_array()
   {
   $datas = $this->clinic_datas->pluck('value','key')->toArray();
    return $datas;
   }

   public function clinic_data($key, $array = null, $default = null)
   {
   $array = (!is_null($array)) ? $array : $this->clinic_data_array();
   if(array_key_exists($key, $array)){
    $value = $array[$key];
    }else{
   $value = $default;
    }
   return $value;
    }

    public function doctor_schedules()
    {
    return $this->hasMany('App\DoctorSchedule');
    }
    
    public function disable_dates()
    { 
    return $this->hasMany('App\DisableDate');
    }

    public function disable_times()
    {
    return $this->hasMany('App\DisableTime');
    }

    public function clinic_notes()
      {
         return $this->hasMany('App\ClinicNote');
      }

    public function manual_disabled_dates()
    {
     $disable_date = $this->disable_dates()->where('key', 'manual')->first();
    if(!is_null($disable_date)){
    return $disable_date->value;
    }else{
    return null;
    }
    }
    public function days_off()
    {
    $days_off = $this->disable_dates()->where('key', 'days_off')->first();
    if(!is_null($days_off)){
    return $days_off->value;
    }else{
    return null;
    }
    }

    public function hours() 
    {
    $hours = $this->disable_times()->where('key', 'hours')->first();
    if(!is_null($hours)){
        return $hours->value;
    }else{
        return null;
    } 
    }
    public function doctor_appointments()
     {
    return $this->hasMany('App\appointments', 'doctor_id');
    }
    


    public function departamento_id()
    {
        $departamento = departamento::find($this->fk_departamento);
        return $departamento;
    }

    public function municipio_id()
    {
        $municipio = municipio::find($this->fk_municipio);
        return $municipio;
    }

    public function type_identificacion_id()
    {
        $tipoIdentificacion = tipoIdentificacion::find($this->fk_tipoDeidentificacion);
        return $tipoIdentificacion;
    }

    public function aseguradora_id()
    {
        $aseguradora = aseguradora::find($this->fk_aseguradora);
        return $aseguradora;
    }

    public function type_aseguradora_id()
    {
        $tipoAseguradora = tipoAseguradora::find($this->fk_tipoAseguradora);
        return $tipoAseguradora;
    }

    public function RH_id()
    {
        $rh = rh::find($this->fk_rh);
        return $rh;
    }

    public function discapacidad_id()
    {
        $discapacidad = discapacidad::find($this->fk_discapacidad);
        return $discapacidad;
    }

    public function grupoEtnico_id()
    {
        $grupoEtnico = grupoEtnico::find($this->fk_grupoEtnico);
        return $grupoEtnico;
    }

    public function nivelEducativo_id()
    {
        $nivelEducativo = nivelEducativo::find($this->fk_nivelEducativo);
        return $nivelEducativo;
    }

    public function religion_id()
    {
        $religion = religion::find($this->fk_religion);
        return $religion;
    }

    public function poblacionRiesgo_id()
    {
        $poblacionRiesgo = poblacionRiesgo::find($this->fk_poblacionRiesgo);
        return $poblacionRiesgo;
    }

    public function regime_id()
    {
        $regime = regime::find($this->fk_regime);
        return $regime;
    }
}
