<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct(
        protected AdminService $adminService
    ) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(
            'email',
            'password',
        );

        if ($this->adminService->login($credentials)) {

            $request->session()->regenerate();

            return redirect()
                ->route('students.index');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request)
    {
        $this->adminService->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
