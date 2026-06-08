<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{
    public function delete(User $user, Student $student){
        return $user->role ==='admin';

    }

    }
