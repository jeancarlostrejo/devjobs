<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\Response;

class VacantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->rol === Role::RECRUITER;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function viewCandidates(User $user, Vacant $vacant)
    {
        return $user->id === $vacant->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->rol === Role::RECRUITER;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacant $vacant): bool
    {
        return $user->id === $vacant->user_id;
    }

    public function apply(User $user)
    {
        return $user->rol === Role::DEVELOPER;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacant $vacant)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacant $vacant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacant $vacant)
    {
        //
    }
}
