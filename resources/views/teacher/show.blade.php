@extends('layouts.app')

@section('content')

<h2>Teacher Details</h2>

<p>
    <strong>Name:</strong>
    {{ $teacher->user->name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $teacher->user->email }}
</p>

<p>
    <strong>Phone:</strong>
    {{ $teacher->user->phone }}
</p>

<p>
    <strong>Subject:</strong>
    {{ $teacher->user->subject }}
</p>

<p>
    <strong>Created At:</strong>
    {{ $teacher->user->created_at }}
</p>

<a href="{{ route('teacher.index') }}">
    Back to Teachers
</a>

@endsection
