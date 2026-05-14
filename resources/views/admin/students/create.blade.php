@extends('layouts.app')

@section('content')

<h2>Create Student</h2>

<form action={{ route('students.store') }}
     method="POST"
     enctype="multipart/form-data">
    @csrf

    @include('admin.students.form')

    <button type="submit">
        Save Student
    </button>

</form>

@endsection
