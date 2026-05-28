
@extends('layouts.app')

@section('content')

<h2>Mark Attendance</h2>

<form
    method="POST"
    action="{{ route('attendance.store') }}"
>

```
@csrf

<label>
    Student
</label>

<br>

<select name="student_id">

    @foreach ($students as $student)

        <option value="{{ $student->id }}">
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

    @foreach ($teachers as $teacher)

        <option value="{{ $teacher->id }}">
            {{ $teacher->name }}
        </option>

    @endforeach

</select>

<br><br>

<label>
    Status
</label>

<br>

<select name="status">

    <option value="present">
        Present
    </option>

    <option value="absent">
        Absent
    </option>

    <option value="leave">
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
>

<br><br>

<button type="submit">
    Save Attendance
</button>
```

</form>

@endsection
