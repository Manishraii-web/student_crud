{{-- resources/views/teacher/create.blade.php --}}

@extends('layouts.app')

@section('content')

<h2>Create Teacher</h2>

<form
    method="POST"
    action="{{ route('teacher.store') }}"
>

@csrf

<label>Name</label>

<br>

<input
    type="text"
    name="name"
    value="{{ old('name') }}"
>

<br><br>

<label>Email</label>

<br>

<input
    type="email"
    name="email"
    value="{{ old('email') }}"
>

<br><br>

<label>Phone</label>

<br>

<input
    type="text"
    name="phone"
    value="{{ old('phone') }}"
>

<br><br>

<label>Subject</label>

<br>

<input
    type="text"
    name="subject"
    value="{{ old('subject') }}"
>

<br><br>

<label>Password</label>

<br>

<input
    type="password"
    name="password"
>

<br><br>

<button type="submit">
    Save Teacher
</button>

</form>

@endsection
