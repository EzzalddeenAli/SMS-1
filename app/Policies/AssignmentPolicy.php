<?php

namespace App\Policies;

use App\Teacher;
use App\Assignment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the teacher can view the assignment.
     *
     * @param $user
     * @param  \App\Assignment $assignment
     * @return mixed
     */
    public function view($user, Assignment $assignment)
    {
        switch ($user) {
            //case teacher
            case ($user->id === $assignment->teacher_id):
                return true;
                break;
            //case student
            case isset($user->section->id):
                return $user->section->id === $assignment->subject->section->id;
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Determine whether the teacher can create assignments.
     *
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function create(Teacher $teacher)
    {
        //
    }

    /**
     * Determine whether the teacher can update the assignment.
     *
     * @param  \App\Teacher  $teacher
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function update(Teacher $teacher, Assignment $assignment)
    {
        //
    }

    /**
     * Determine whether the teacher can delete the assignment.
     *
     * @param  \App\Teacher  $teacher
     * @param  \App\Assignment  $assignment
     * @return mixed
     */
    public function delete(Teacher $teacher, Assignment $assignment)
    {
        //
    }
}
