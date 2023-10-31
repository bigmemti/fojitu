<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-list-course');
    }

    /**
     * Determine whether the user can view teaching models.
     */
    public function viewTeachingCourse(User $user): bool
    {
        return $user->hasPermission('view-teaching-list-course');
    }

    /**
     * Determine whether the user can view teaching models.
     */
    public function viewCourseMember(User $user, Course $course): bool
    {
        return $user->hasPermission('view-member-list-course');
    }

    /**
     * Determine whether the user can view studying models.
     */
    public function viewStudyingCourse(User $user): bool
    {
        return $user->hasPermission('view-studying-list-course');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Course $course): bool
    {
        return $user->hasPermission('view-course') && ($course->teacher->user_id == $user->id || $user->isMemberOf($course));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function membership(User $user, Course $course): bool
    {
        return $user->hasPermission('member-course') && (!($course->teacher->user_id == $user->id || $user->isMemberOf($course)) && $user->student->curriculum_id === $course->curriculum_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Institution $institution): bool
    {
        return $user->hasPermission('create-course') && $user->teacher->institution_id == $institution->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course): bool
    {
        return $user->hasPermission('update-course') && $user->teacher->id == $course->teacher_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return $user->hasPermission('delete-course') && $user->teacher->id == $course->teacher_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        return $user->hasPermission('restore-course') && $user->teacher->id == $course->teacher_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        return $user->hasPermission('force-delete-course') && $user->teacher->id == $course->teacher_id;
    }
}
