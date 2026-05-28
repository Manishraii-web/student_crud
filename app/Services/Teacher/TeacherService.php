<?php

namespace App\Services\Teacher;
use App\Models\Teacher;
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
        $data['password'] =Hash::make($data['password']);
        return $this->teacher->create($data);
    }

    public function update($id, array $data){
        $teacher = $this->teacher->findOrFail($id);
        return $teacher->update($data);
    }

    public function delete($id){
      return  $this->teacher->findOrFail($id)->delete();

    }



}
