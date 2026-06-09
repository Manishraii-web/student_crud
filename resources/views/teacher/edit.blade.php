{{-- resources/views/teacher/edit.blade.php --}}

@extends('layouts.app')

@section('content')

<h2>Edit Teacher</h2>

<form
    method="POST"
    action="{{ route('teacher.update', $teacher->id) }}"
>

@csrf
@method('PUT')

<label>Name</label>

<br>

<input
    type="text"
    name="name"
    value="{{ old('name', $teacher->user->name) }}"
>

<br><br>

<label>Email</label>

<br>

<input
    type="email"
    name="email"
    value="{{ old('email', $teacher->user->email) }}"
>

<br><br>

<label>Phone</label>

<br>

<input
    type="text"
    name="phone"
    value="{{ old('phone', $teacher->phone) }}"
>

<br><br>

<label>Subject</label>

<br>

<input
    type="text"
    name="subject"
    value="{{ old('subject', $teacher->subject) }}"
>

<br><br>

<button type="submit">
    Update Teacher
</button>

</form>

@endsection
