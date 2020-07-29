<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class userPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view_appointments_calendar(User $empleado,User $model)
    {   
         if ($empleado->hasRole('Doctor')) {
             return $empleado->id == $model->id;
         }
         return true;
    } 

    public function listar_empleado(User $empleados)
    {   
         $empleados = $empleados->hasPermissionTo('listar empleados');
         return $empleados;
    } 
    public function registrar_empleado(User $empleados)
    {   
         $empleados = $empleados->hasPermissionTo('registrar empleado');
         return $empleados;
    } 

  

  
}
