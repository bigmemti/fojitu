<?php

namespace App\Policies;

use App\Models\HomeWork;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HomeWorkPolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-homework');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HomeWork $homework): bool
    {
        return $user->hasPermission('view-homework');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-homework');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HomeWork $homework): bool
    {
        return $user->hasPermission('update-homework');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HomeWork $homework): bool
    {
        return $user->hasPermission('delete-homework');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HomeWork $homework): bool
    {
        return $user->hasPermission('restore-homework');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HomeWork $homework): bool
    {
        return $user->hasPermission('force-delete-homework');
    }
}
