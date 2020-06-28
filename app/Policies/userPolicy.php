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
}
