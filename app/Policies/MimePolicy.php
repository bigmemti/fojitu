<?php

namespace App\Policies;

use App\Models\Mime;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MimePolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-mime');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Mime $mime): bool
    {
        return $user->hasPermission('view-mime');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-mime');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Mime $mime): bool
    {
        return $user->hasPermission('update-mime');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Mime $mime): bool
    {
        return $user->hasPermission('delete-mime');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Mime $mime): bool
    {
        return $user->hasPermission('restore-mime');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Mime $mime): bool
    {
        return $user->hasPermission('force-delete-mime');
    }
}
