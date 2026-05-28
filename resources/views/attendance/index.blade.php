

@extends('layouts.app')

@section('content')

<h2>Attendance List</h2>

<a href="{{ route('attendance.create') }}">
    Mark Attendance
</a>

<br><br>

<table border="1" cellpadding="10">

```
<tr>

    <th>ID</th>

    <th>Student</th>

    <th>Teacher</th>

    <th>Status</th>

    <th>Date</th>

    <th>Action</th>

</tr>

@foreach ($attendances as $attendance)

    <tr>

        <td>{{ $attendance->id }}</td>

        <td>{{ $attendance->student->name }}</td>

        <td>{{ $attendance->teacher->name }}</td>

        <td>{{ $attendance->status }}</td>

        <td>{{ $attendance->date }}</td>

        <td>

            <a href="{{ route('attendance.edit', $attendance->id) }}">
                Edit
            </a>

            |

            <form
                action="{{ route('attendance.destroy', $attendance->id) }}"
                method="POST"
                style="display:inline;"
            >

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>

    </tr>

@endforeach
```

</table>

@endsection
