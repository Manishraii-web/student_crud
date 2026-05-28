<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Attendance;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public function __construct(protected TeacherService $teacherSerivce, protected AttendanceService $attendanceService){}
      public function index()
    {
        $teachers = $this->teacherSerivce->getall();
        return view('teeacher.index');

    }


    public function create()
    {
      return view('teacher.create');
    }

    public function store(StoreTeacherRequest $request)
    {
       $this->teacherSerivce->store($request->validated());
    }

       public function show(string $id)
    {
       return view('teacher.show');
    }


    public function edit(string $id)
    {
       $attendance = $this->attendanceService->getAll();
       return view('student.edit', compact('student','attendance'));
    }


    public function update(UpdateTeacherRequest $request, string $id)
    {
     $this->teacherSerivce->update($id, $request->validated());
     return redirect()->route('teacher.index')->with('success','Congrates Teacher You are logged in......');
    }


    public function destroy(string $id)
    {
        $this->teacherSerivce->delete($id);
        return redirect()->route('teacher.index')->with('success', 'Teacher Deleted Successfull');
    }
}
