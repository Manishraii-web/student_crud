<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Attendance;
use App\Services\Attendance\AttendanceService;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



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

       return redirect()->route('teacher.index')->with('success',"Teacher created successfully");
    }

       public function show($id)  {
        $teacher = $this->teacherService->find($id);
       return view('teacher.show', compact('teacher'));
    }


    public function edit($id)
    {
        $teacher =  $this->teacherService->find($id);
       return view('teacher.edit', compact('teacher'));
    }


    public function update(UpdateTeacherRequest $request,  $id)
    {

    $teacher = $this->teacherService->find($id);

     $this->authorize('update', $teacher);
     $this->teacherService->update($request, $id);
     return redirect()->route('teacher.index')->with('success','Teacher updated successfully');
    }


    public function destroy(string $id)
    {
        $this->teacherService->delete($id);
        return redirect()->route('teacher.index')->with('success', 'Teacher Deleted Successfull');
    }
}
