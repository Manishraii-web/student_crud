<?php

namespace App\Services\PasswordReset;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class PasswordResetService
{
//    @param array{email: string} $data

   public function sendResetLink(array $data) : string{
   return Password::sendResetLink([
    'email' =>  $data['email'],
   ]);
   }

   public function resetPassword(array $credentials) {
    return Password::reset(
        $credentials, function(User $user, string $password){
            $this->updatePassword($user, $password);
        }
    );
   }

   //update user password and invalidate remember me session

   protected function updatePassword(User $user, string $password){
    $user->forceFill([
        'password' => Hash::make($password),
    ])->setRememberToken(Str::random(60));

    $user->save();
    event(new passwordReset($user));
   }
}
