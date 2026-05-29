

@extends('layouts.app')

@section('content')

<h2>Edit Attendance</h2>

<form
    method="POST"
    action="{{ route('attendance.update', $attendance->id) }}"
>

@csrf
@method('PUT')

<label>
    Status
</label>

<br>

<select name="status">

    <option
        value="present"
        {{ $attendance->status == 'present' ? 'selected' : '' }}
    >
        Present
    </option>

    <option
        value="absent"
        {{ $attendance->status == 'absent' ? 'selected' : '' }}
    >
        Absent
    </option>

    <option
        value="leave"
        {{ $attendance->status == 'leave' ? 'selected' : '' }}
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
    value="{{ $attendance->date }}"
>

<br><br>

<button type="submit">
    Update Attendance
</button>

</form>

@endsection
