@extends('layouts.app')

@section('content')

<h2>Create Student</h2>

<form action="{{ route('students.store') }}" method="POST">

    @csrf

    @include('admin.students.form')

    <button type="submit">
        Save Student
    </button>

</form>

@endsection
