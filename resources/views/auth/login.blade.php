@extends('layouts.app')

@section('content')

<h2>Login</h2>

@if(session('error'))

    <p style="color:red;">
        {{ session('error') }}
    </p>

@endif

<form action="{{ route('login.submit') }}" method="POST">

    @csrf

    <div>

        <label>Email</label>

        <br>

        <input
            type="email"
            name="email"
            required
        >

    </div>

    <br>

    <div>

        <label>Password</label>

        <br>

        <input
            type="password"
            name="password"
            required
        >

    </div>

    <br>

    <button type="submit">
        Login
    </button>

</form>

@endsection
