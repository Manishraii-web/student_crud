<?php

namespace App\Services\Teacher;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Teacher $teacher)
    {  }
     public function getAll(){
        return $this->teacher->all();
    }

    public function find($id){
        return $this->teacher->findOrFail($id);
    }

    public function store(array $data){
        return DB::transaction(function () use ($data) {
            $data['password'] = Hash::make($data['password']);

            $teacher = $this->teacher->create($data);

            User::create([
                'name' => $teacher->name,
                'email' => $teacher->email,
                'password' => $data['password'],
                'role' => 'teacher',
            ]);

            return $teacher;
        });
    }

    public function update($id, array $data){
        $teacher = $this->teacher->findOrFail($id);
        $oldEmail = $teacher->email;

        return DB::transaction(function () use ($teacher, $oldEmail, $data) {
            $updated = $teacher->update($data);

            User::where('email', $oldEmail)
                ->where('role', 'teacher')
                ->update([
                    'name' => $teacher->name,
                    'email' => $teacher->email,
                ]);

            return $updated;
        });
    }

    public function delete($id){
        $teacher = $this->teacher->findOrFail($id);

        return DB::transaction(function () use ($teacher) {
            User::where('email', $teacher->email)
                ->where('role', 'teacher')
                ->delete();

            return $teacher->delete();
        });

    }



}
