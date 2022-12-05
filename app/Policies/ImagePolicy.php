<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function validar(User $user, Image $imagen){
        if($user->id == $imagen->user_id || $imagen->user->rol == 'Empleado') return true;
        else return false;
    }

    public function permiso(User $user, Image $imagen){
        if($user->id == $imagen->user_id) return true;
        else return false;
    }
}
