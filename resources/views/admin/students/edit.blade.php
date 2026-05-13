@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

<form action="{{ route('students.update', $student->id) }}" method="POST">

    @csrf
    @method('PUT')

    @include('admin.students.form')

    <button type="submit">
        Update Student
    </button>

</form>

@endsection
