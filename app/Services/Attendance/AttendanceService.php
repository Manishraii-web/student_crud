<?php

namespace App\Services\Attendance;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceService{

    public function __construct(protected Attendance $attendance) {}

    public function getAll(){
        return $this->attendance->all();
    }

    public function create(){
        return [
            'students' => Student::all(),
            'teachers' => Teacher::all(),
        ];
    }

    public function store(array $data) {
     return $this->attendance->create($data);
    }

    public function find($id) {
       return $this->attendance->findOrFail($id);
    }

    public function update($id, array $data){
        $attendance = $this->attendance->findOrFail($id);
        return $attendance->update($data);
    }

    public function delete($id){
        return $this->attendance->findOrFail($id)->delete();
    }
}
