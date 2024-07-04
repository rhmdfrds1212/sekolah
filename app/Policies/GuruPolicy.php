<?php

namespace App\Policies;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GuruPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Guru $guru)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'A' || $user->role === 'G';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->role ==='A';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Guru $guru): bool
    {
        return $user->role ==='A';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Guru $guru)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Guru $guru)
    {
        //
    }
}