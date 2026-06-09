<?php

namespace App\Services\Teacher;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TeacherService
{
    public function __construct(protected Teacher $teacher) {}

    public function getAll() {
        return $this->teacher->with('user')->get();
    }

    public function find($id) {
        return $this->teacher->with('user')->findOrFail($id);
    }

    public function store(array $data) {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => $data['password'],   // 'hashed' cast handles it
                'role'     => 'teacher',
            ]);

            $user->sendEmailVerificationNotification();

            return $user->teacherProfile()->create([
                'phone'   => $data['phone'],
                'subject' => $data['subject'],
            ]);
        });
    }

    public function update($id, array $data) {
        $teacher = $this->teacher->findOrFail($id);

        return DB::transaction(function () use ($teacher, $data) {
            $teacher->user->update([
                'name'  => $data['name'],
                'email' => $data['email'],
            ]);

            $teacher->update([
                'phone'   => $data['phone'],
                'subject' => $data['subject'],
            ]);

            return $teacher;
        });
    }

    public function delete($id) {
        $teacher = $this->teacher->findOrFail($id);

        return DB::transaction(function () use ($teacher) {
            $teacher->user->delete();   // cascade removes the teacher profile
            return true;
        });
    }
}
