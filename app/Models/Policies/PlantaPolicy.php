<?php

namespace App\Models\Policies;

use App\Models\Planta;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlantaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('manageApp');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Planta $planta)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('manageApp');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Planta $planta)
    {
        return $user->can('manageApp');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Planta $planta)
    {
        return $user->can('adminApp');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Planta $planta)
    {
        return $user->can('adminApp');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Planta  $planta
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Planta $planta)
    {
        return $user->can('adminApp');
    }
}
