<?php

namespace App\Policies;

use App\Models\Practice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PracticePolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-practice');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Practice $practice): bool
    {
        return $user->hasPermission('view-practice');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-practice');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Practice $practice): bool
    {
        return $user->hasPermission('update-practice');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Practice $practice): bool
    {
        return $user->hasPermission('delete-practice');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Practice $practice): bool
    {
        return $user->hasPermission('restore-practice');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Practice $practice): bool
    {
        return $user->hasPermission('force-delete-practice');
    }
}
