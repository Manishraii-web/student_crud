<div style="padding: 2rem;">
    <p>Please verify your email address. Check your inbox for the verification link.</p>

    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend verification email</button>
    </form>
</div>
