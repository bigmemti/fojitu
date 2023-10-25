<?php

namespace App\Policies;

use App\Models\Session;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SessionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Session $session): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->user()->is_admin || auth()->user()->teacher;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Session $session): bool
    {
        return auth()->user()->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Session $session): bool
    {
        return auth()->user()->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Session $session): bool
    {
        return auth()->user()->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Session $session): bool
    {
        return auth()->user()->is_admin;
    }
}
