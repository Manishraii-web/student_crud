<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD</title>
</head>
<body>

    <h1> Student CRUD Demo Project....</h1>

    <hr>

    @if (session('success'))
        <p style="color:green;">
            {{ session('success') }}
        </p>
    @endif

    @if (session('error'))
        <p style="color:red;">
            {{ session('error') }}
        </p>
    @endif

    @yield('content')
    <form action="{{ route('logout') }}" method="POST">

    @csrf

    <button type="submit">
        Logout
    </button>

</form>


</body>
</html>
