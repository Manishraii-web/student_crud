@extends('layouts.app')

@section('content')

<h2>Teacher Details</h2>

<p>
    <strong>Name:</strong>
    {{ $teacher->name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $teacher->email }}
</p>

<p>
    <strong>Phone:</strong>
    {{ $teacher->phone }}
</p>

<p>
    <strong>Subject:</strong>
    {{ $teacher->subject }}
</p>

<p>
    <strong>Created At:</strong>
    {{ $teacher->created_at }}
</p>

<a href="{{ route('teacher.index') }}">
    Back to Teachers
</a>

@endsection
