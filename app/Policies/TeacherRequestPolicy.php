<?php

namespace App\Policies;

use App\Models\TeacherRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeacherRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-teacher-request');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TeacherRequest $teacher_request): bool
    {
        return $user->hasPermission('view-teacher-request');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-teacher-request');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TeacherRequest $teacher_request): bool
    {
        return $user->hasPermission('update-teacher-request');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TeacherRequest $teacher_request): bool
    {
        return $user->hasPermission('delete-teacher-request');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TeacherRequest $teacher_request): bool
    {
        return $user->hasPermission('restore-teacher-request');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TeacherRequest $teacher_request): bool
    {
        return $user->hasPermission('force-delete-teacher-request');
    }
}
