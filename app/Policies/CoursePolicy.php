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
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Course $course): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'teacher']); // Only admin and teacher can create courses
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course)
    {
        return in_array($user->role, ['admin', 'teacher']); // Only admin and teacher can update courses
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course)
    {
        return in_array($user->role, ['admin', 'teacher']); // Only admin and teacher can delete courses
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        //
    }
}
