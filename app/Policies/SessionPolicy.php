<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Session;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SessionPolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Course $course): bool
    {
        return $user->hasPermission('view-list-session') && ($course->teacher->user_id == $user->id || $user->isMemberOf($course));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Session $session): bool
    {
        return $user->hasPermission('view-session') && ($session->course->teacher->user_id == $user->id || $user->isMemberOf($session->course));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Course $course): bool
    {
        return $user->hasPermission('create-session') && $course->teacher->user_id == $user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Session $session): bool
    {
        return $user->hasPermission('update-session') && $session->course->teacher->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Session $session): bool
    {
        return $user->hasPermission('delete-session') && $session->course->teacher->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Session $session): bool
    {
        return $user->hasPermission('restore-session') && $session->course->teacher->user_id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Session $session): bool
    {
        return $user->hasPermission('force-delete-session') && $session->course->teacher->user_id == $user->id;
    }
}
