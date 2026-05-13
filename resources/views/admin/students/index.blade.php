@extends('layouts.app')

@section('content')

<h2>Student List</h2>

<a href="{{ route('students.create') }}">
    Add Student
</a>

@endsection
