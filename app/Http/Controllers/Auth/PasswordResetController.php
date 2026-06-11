<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPassword\ForgotPasswordRequest;
use App\Http\Requests\ResetPassword\ResetPasswordRequest;
use App\Services\PasswordReset\PasswordResetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function __construct(protected PasswordResetService $passwordResetService){}
   public function showForgotForm(){
    return view('auth.forgot-password');
   }

   public function sendResetLink(ForgotPasswordRequest $request){

   $status = $this->passwordResetService->sendResetLink($request->validated());

   return $status === Password::ResetLinkSent ?
    back()->with(['status'=>__($status)]) :
    back()->withErrors(['email' =>__($status)]);
   }

   public function showResetform(string $token){
    return view('auth.reset-password',['token'=> $token]);
   }

   public function resetPassword(ResetPasswordRequest $request){
    $status= $this->passwordResetService->resetPassword(
        $request->only('email', 'password', 'password_confirmation','token')
    );
    return $status === Password::PasswordReset ?
    redirect()->route('login')->with('status',__($status)) :
    back()->withErrors(['email' =>[__($status)]]);
   }
}
