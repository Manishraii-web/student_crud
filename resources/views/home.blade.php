@extends('layouts.app')

@section('content')

<h1>School Management System</h1>

<br>

<a href="{{ route('students.index') }}">
    Manage Students
</a>

<br><br>

<a href="{{ route('teacher.index') }}">
    Manage Teachers
</a>

<br><br>

<a href="{{ route('attendance.index') }}">
    Manage Attendance
</a>

<br><br>

<form action="{{ route('logout') }}" method="POST">

    @csrf

    <button type="submit">
        Logout
    </button>

</form>

@endsection
