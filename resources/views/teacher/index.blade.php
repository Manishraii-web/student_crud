@extends('layouts.app')

@section('content')

<h2>Teacher List</h2>

<a href="{{ route('teacher.create') }}">
    Add Teacher
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Email</th>

        <th>Phone</th>

        <th>Subject</th>

        <th>Action</th>

    </tr>

    @foreach ($teachers as $teacher)

        <tr>

            <td>{{ $teacher->id }}</td>

            <td>{{ $teacher->name }}</td>

            <td>{{ $teacher->email }}</td>

            <td>{{ $teacher->phone }}</td>

            <td>{{ $teacher->subject }}</td>

            <td>

                <a href="{{ route('teacher.show', $teacher->user->id) }}">
                    Show
                </a>

                |

                <a href="{{ route('teacher.edit', $teacher->user->id) }}">
                    Edit
                </a>

                |

                <form
                    action="{{ route('teacher.destroy', $teacher->user->id) }}"
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

</table>

@endsection
