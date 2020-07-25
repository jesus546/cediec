<?php

namespace App\Policies;

use App\User;
use App\specialities;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpecialityPolicy
{
    use HandlesAuthorization;

    
    public function create(User $user)
    {
      
    }

 
    public function update(User $user, specialities $specialities)
    {
        //
    }

    public function delete(User $user, specialities $specialities)
    {
        //
    }

    public function restore(User $user, specialities $specialities)
    {
        //
    }

    
    public function forceDelete(User $user, specialities $specialities)
    {
        //
    }
}
