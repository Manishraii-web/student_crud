<?php
namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AdminService
{
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
