{{-- resources/views/attendance/show.blade.php --}}

@extends('layouts.app')

@section('content')

<h2>Attendance Details</h2>

<table border="1" cellpadding="10">

```
<tr>
    <th>ID</th>
    <td>{{ $attendance->id }}</td>
</tr>

<tr>
    <th>Student Name</th>
    <td>{{ $attendance->student->name }}</td>
</tr>

<tr>
    <th>Teacher Name</th>
    <td>{{ $attendance->teacher->name }}</td>
</tr>

<tr>
    <th>Status</th>
    <td>{{ $attendance->status }}</td>
</tr>

<tr>
    <th>Date</th>
    <td>{{ $attendance->date }}</td>
</tr>

<tr>
    <th>Created At</th>
    <td>{{ $attendance->created_at }}</td>
</tr>
```

</table>

<br>

<a href="{{ route('attendance.index') }}">
    Back
</a>

@endsection
