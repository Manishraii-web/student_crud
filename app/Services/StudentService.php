<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{

    public function __construct(protected Student $student) {}


    //-------------------------------------------------------------------------------------

    public function getStudents($request)
    {
        return $this->student
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
                // -> orwhere('email', 'like','%'.$request->search .'%')
                // ->orwhere('phone','like','%' .$request->search .'%');

            })
            ->orderBy('created_at', 'asc')
            ->paginate(5);
    }
    // ------------------------------------------------------------------------------

    public function storeStudents($data, $image= null)
    {
        if($image) {
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('students-images'), $imageName);
           $data['image'] = $imageName;
        }
        return $this->student->create($data);
    }

    //--------------------------------------------------------------------------


    public function find($id)
    {
        return $this->student->findOrFail($id);
    }

    //---------------------------------------------------------------------------
    public function updateStudent($data, string $id)
    {
        $student = $this->find($id);

        if ($data->hasFile('image')) {
            $image = $data->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('students-images'), $imageName);
            $data['image'] = $imageName;
        }

        return $student->update($data);
    }
    //-----------------------------------------------------------------------

    public function deleteStudent( string $id)
    {
        return $this->find($id)->delete();
    }
}
