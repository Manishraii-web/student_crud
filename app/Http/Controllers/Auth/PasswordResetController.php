<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\PasswordReset\PasswordResetService;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function __construct(protected PasswordResetService $passwordResetService){}
   public function showForgotForm(){
    return view('auth.forgot-password');
   }

   public function sendResetLink(){

   }
}
