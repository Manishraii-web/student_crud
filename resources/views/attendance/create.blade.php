
@extends('layouts.app')

@section('content')

<h2>Mark Attendance</h2>

@if ($students->isEmpty())
    <p style="color:red;">Please add a student before marking attendance.</p>
@endif

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    method="POST"
    action="{{ route('attendance.store') }}"
>

@csrf

<label>
    Student
</label>

<br>

<select name="student_id" required>

    <option value="">Select Student</option>

    @foreach ($students as $student)

        <option
            value="{{ $student->id }}"
            {{ old('student_id') == $student->id ? 'selected' : '' }}
        >
            {{ $student->name }}
        </option>

    @endforeach

</select>

<br><br>

<label>
    Teacher
</label>

<br>

<select name="teacher_id">

    <option value="">No Teacher</option>

    @foreach ($teachers as $teacher)

        <option
            value="{{ $teacher->id }}"
            {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}
        >
            {{ $teacher->name }}
        </option>

    @endforeach

</select>

<br><br>

<label>
    Status
</label>

<br>

<select name="status" required>

    <option
        value="present"
        {{ old('status') == 'present' ? 'selected' : '' }}
    >
        Present
    </option>

    <option
        value="absent"
        {{ old('status') == 'absent' ? 'selected' : '' }}
    >
        Absent
    </option>

    <option
        value="leave"
        {{ old('status') == 'leave' ? 'selected' : '' }}
    >
        Leave
    </option>

</select>

<br><br>

<label>
    Date
</label>

<br>

<input
    type="date"
    name="date"
    value="{{ old('date') }}"
    required
>

<br><br>

<button type="submit">
    Save Attendance
</button>

</form>

@endsection
