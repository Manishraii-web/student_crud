<?php

namespace App\Services\Teacher;
use App\Models\Teacher;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected Teacher $teacher)
    {  }
     public function getall(){
        return $this->teacher->all();
    }

    public function store(array $data){
        return $this->teacher->create($data);
    }

    public function update($id, array $data){
        $teacher = $this->teacher->find($id);
        return $teacher->update($data);
    }

    public function delete($id){
      return  $this->teacher->findOrFail($id)->delete();

    }



}
