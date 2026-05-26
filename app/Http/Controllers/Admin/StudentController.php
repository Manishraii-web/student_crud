<?php

namespace App\Http\Controllers\Admin;

use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{

    public function __construct(protected StudentService $studentService) {}
    //---------------------------------------------------------------------

    public function index(Request $request)
    {
        $students = $this->studentService->getStudents($request);
        // return view('admin.students.index', compact('students'));
        return StudentResource::collection($students);
    }
    // ------------------------------------------------------------------
    public function create()
    {
        return view('admin.students.create');
    }
    // ------------------------------------------------------------------

    public function store(StudentRequest $request)
    {
        $this->studentService->storeStudents(
            $request->all(),
            $request->file('image')
        );
        return redirect()
            ->route('students.index')
            ->with('success', 'Stuent is created successfully!!!');
    }
// ------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->studentService->find($id);
        return view("admin.students.show", compact('student'));
    }
    //-------------------------------------------------------------------------

    public function edit(String $id)
    {
        $student = $this->studentService->find($id);
        return view('admin.students.edit', compact('student'));
    }

    //---------------------------------------------------------------------
    public function update(Request $request, string $id)
    {
        $this->studentService->updateStudent($request, $id);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully!');
    }
    //----------------------------------------------------------------

    public function destroy(string $id)
    {
        $this->studentService->deleteStudent($id);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
