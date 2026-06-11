<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\StoreAttendanceRequest;
use App\Http\Requests\Attendance\UpdateAttendanceRequest;
use App\Services\Attendance\AttendanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AttendanceController extends Controller
{
    public function __construct(protected AttendanceService $attendanceService){}

    public function index(){
        $attendances = $this->attendanceService->getAll();
        return view('attendance.index', compact('attendances'));
    }
    public function create(){
        Gate::authorize('mark-attendance');

        $data = $this->attendanceService->create();
        return view('attendance.create', [
            'students' => $data['students'],
        ]);
    }

    public function store(StoreAttendanceRequest $request){
        if(!Gate::allows('mark-attendance')){
            return redirect()->route('attendance.index')->with('error','You cant Mark Attendance.');

        }
        $this->attendanceService->store($request->validated());
        return redirect()->route('attendance.index')->with('success',"Marked Successfully");
    }

    public function edit($id){
        $attendance = $this->attendanceService->find($id);
        return view('attendance.edit', compact('attendance'));
    }

    public function show($id){
        $attendance = $this->attendanceService->find($id);
        return view('attendance.show', compact('attendance'));
    }

    public function update(UpdateAttendanceRequest $request, $id){
        $this->attendanceService->update($id, $request->validated());
        return redirect()->route('attendance.index')->with('success','Updated Successfull');
    }

    public function destroy($id){
       if(! Gate::allows('admin-func')){
        return redirect()->route('attendance.index')->with('error','Only Admin can');
       }
        $this->attendanceService->delete($id);
        return redirect()->route('attendance.index')->with('success', 'Deleted Successfully');
    }

}
