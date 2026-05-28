<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Attendance;
use App\Services\Attendance\AttendanceService;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public function __construct(protected TeacherService $teacherService, protected AttendanceService $attendanceService){}
      public function index() {
        $teachers = $this->teacherService->getAll();
        return view('teacher.index', compact('teachers'));
    }

    public function create() {
      return view('teacher.create');
    }

    public function store(StoreTeacherRequest $request)  {
       $this->teacherService->store($request->validated());

       return redirect()->route('teacher.index')->with('success',"Teacher succesfully");
    }

       public function show($id)  {
        $teacher = $this->teacherService->find($id);
       return view('teachers.show');
    }


    public function edit($id)
    {
        $teacher =  $this->teacherService->find($id);
       $attendance = $this->attendanceService->getAll();
       return view('student.edit', compact('student','attendance'));
    }


    public function update(UpdateTeacherRequest $request, string $id)
    {
     $this->teacherService->update($id, $request->validated());
     return redirect()->route('teacher.index')->with('success','Congrates Teacher You are logged in......');
    }


    public function destroy(string $id)
    {
        $this->teacherService->delete($id);
        return redirect()->route('teacher.index')->with('success', 'Teacher Deleted Successfull');
    }
}
