<?php

namespace App\Policies;

use App\Models\Attendance;
use App\Models\Session;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AttendancePolicy
{
   /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Session $session): bool
    {
        return $user->hasPermission('view-list-attendance') && $session->course->teacher->user_id == $user->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Attendance $attendance): bool
    {
        return $user->hasPermission('view-attendance');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-attendance');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Attendance $attendance): bool
    {
        return $user->hasPermission('update-attendance');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Attendance $attendance): bool
    {
        return $user->hasPermission('delete-attendance');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Attendance $attendance): bool
    {
        return $user->hasPermission('restore-attendance');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Attendance $attendance): bool
    {
        return $user->hasPermission('force-delete-attendance');
    }
}
