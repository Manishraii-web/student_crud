<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{
       public function update(User $user, Student $student):bool
       {
        return in_array($user->role,['admin','teacher']);
    }
    public function delete(User $user, Student $student){
        return $user->role ==='admin';
    }



    }
