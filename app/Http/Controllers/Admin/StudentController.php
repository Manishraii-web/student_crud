<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::when($request->search, function ($query) use ($request){
            $query->where('name', 'like', '%' .$request->search .'%');
            // -> orwhere('email', 'like','%'.$request->search .'%')
            // ->orwhere('phone','like','%' .$request->search .'%');

        })
        ->latest()
        ->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
         $data  = $request->only([

                'name',
                'email',
                'phone',
                'address',

            ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('students'), $imageName);

            $data['image'] = $imageName;
        }
          Student::create($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Stuent is created successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $student = Student::findorFail($id);

        return view("admin.students.show", compact('student'));
    }

    public function edit(String $id)
    {
        $student = Student::findorFail($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $data = $request->only([
            'name',
            'email',
            'phone',
            'address',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('students'), $imageName);

            $data['image'] = $imageName;
        }

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
