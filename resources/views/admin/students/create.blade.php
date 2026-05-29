@extends('layouts.app')

@section('content')

<h2>Add Student</h2>

<form
    action="{{ route('students.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <input
        type="text"
        name="name"
        placeholder="Enter Name"
    >

    <br><br>

    <input
        type="email"
        name="email"
        placeholder="Enter Email"
    >

    <br><br>

    <input
        type="text"
        name="phone"
        placeholder="Enter Phone"
    >

    <br><br>

    <input
        type="text"
        name="address"
        placeholder="Enter Address"
    >

    <br><br>

    <input
        type="file"
        name="image"
    >

    <br><br>

    <button type="submit">
        Save Student
    </button>

</form>

@endsection
