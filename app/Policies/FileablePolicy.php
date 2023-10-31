<?php

namespace App\Policies;

use App\Models\Fileable;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FileablePolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-fileable');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Fileable $fileable): bool
    {
        return $user->hasPermission('view-fileable');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-fileable');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Fileable $fileable): bool
    {
        return $user->hasPermission('update-fileable');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fileable $fileable): bool
    {
        return $user->hasPermission('delete-fileable');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Fileable $fileable): bool
    {
        return $user->hasPermission('restore-fileable');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Fileable $fileable): bool
    {
        return $user->hasPermission('force-delete-fileable');
    }
}
