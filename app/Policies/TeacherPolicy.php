<?php

namespace App\Policies;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeacherPolicy
{
    public function update(User $user, Teacher $teacher){

    return $user->role==='admin';
    }
}

