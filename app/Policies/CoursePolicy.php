<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view teaching models.
     */
    public function viewTeachingCourse(User $user): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Determine whether the user can view teaching models.
     */
    public function viewCourseMember(User $user, Course $course): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Determine whether the user can view studying models.
     */
    public function viewStudyingCourse(User $user): bool
    {
        return auth()->user()->student !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Course $course): bool
    {
        return ($course->teacher->user_id === $user->id || $user->isMemberOf($course));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function membership(User $user, Course $course): bool
    {
        return (!($course->teacher->user_id === $user->id || $user->isMemberOf($course)) && $user->student->curriculum_id === $course->curriculum_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        return auth()->user()->teacher !== null;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        return auth()->user()->teacher !== null;
    }
}
