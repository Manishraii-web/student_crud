<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\StoreAttendanceRequest;
use App\Http\Requests\Attendance\UpdateAttendanceRequest;
use App\Services\Attendance\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(protected AttendanceService $attendanceService){}

    public function index(){
        $attendances = $this->attendanceService->getAll();
        return view('attendance.index', compact('attendances'));
    }
    public function create(){
        $data = $this->attendanceService->create();
        return view('attendance.create', compact('students','teachers'));
    }

    public function store(StoreAttendanceRequest $request){
        $this->attendanceService->store($request->validated());
        return redirect()->route('attendance.index')->with('success',"Marked Successfully");
    }

    public function edit($id){
    $attendance = $this->attendanceService->find($id);
    return view('attendance.edit', compact('attendances'));
    }

    public function update(UpdateAttendanceRequest $request, $id){
        $this->attendanceService->update($id, $request->validated());
        return redirect()->route('attendance.index')->with('success','Updated Successfull');
    }

}
