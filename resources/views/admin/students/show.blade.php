@extends('layouts.app')

@section('content')

<h2>Student Details</h2>

<p>
    <strong>Name:</strong>
    {{ $student->name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $student->email }}
</p>

<p>
    <strong>Phone:</strong>
    {{ $student->phone }}
</p>

<p>
    <strong>Address:</strong>
    {{ $student->address }}

</p>

<p>
    <strong>Created At:</strong>
    {{ $student->created_at }}
</p>

<p>
    <strong>Image:</strong>
    <br>
    @if ($student->image)
        <img src="{{ asset('students/' . $student->image) }}" alt="Student Image" width="200">
    @else
        No image available.
    @endif
</p>

@endsection
