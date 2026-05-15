@extends('layouts.app')

@section('content')
    <h2>Student List</h2>

    <a href="{{ route('students.create') }}">
        Add Student
    </a>

    <br><br>

    <form method="GET" action="{{ route('students.index') }}">

    <input
        type="text"
        name="search"
        placeholder="Search student..."
        value="{{ request('search') }}"
    >

    <button type="submit">
        Search
    </button>

</form>

<br>
    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Image</th>

            <th>Action</th>
        </tr>

        @foreach ($students as $student)
            <tr>

                <td>{{ $student->id }}</td>

                <td>{{ $student->name }}</td>

                <td>{{ $student->email }}</td>

                <td>{{ $student->phone }}</td>

                <td>{{ $student->address }}</td>

                <td>{{ $student->created_at }}</td>

                <td>
                    @if ($student->image)
                        <img src="{{ asset('students/' . $student->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}">


                        |

                        <a href="{{ route('students.edit', $student->id) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">

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

 {{ $students->links() }}

@endsection
