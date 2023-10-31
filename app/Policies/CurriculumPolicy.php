<?php

namespace App\Policies;

use App\Models\Curriculum;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CurriculumPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-curriculum');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Curriculum $curriculum): bool
    {
        return $user->hasPermission('view-curriculum');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-curriculum');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Curriculum $curriculum): bool
    {
        return $user->hasPermission('update-curriculum');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Curriculum $curriculum): bool
    {
        return $user->hasPermission('delete-curriculum');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Curriculum $curriculum): bool
    {
        return $user->hasPermission('restore-curriculum');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Curriculum $curriculum): bool
    {
        return $user->hasPermission('force-delete-curriculum');
    }
}
