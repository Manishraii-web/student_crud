<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', function () {

    return view('home');

})->name('home');

Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('students', [StudentController::class, 'index'])->name('students.index');
// Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
// Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::post('students', [StudentController::class, 'store'])->name('students.store');
// Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');
// Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
// Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
// Route::middleware(['auth', 'admin'])->group(function () {

// Route::middleware('admin')->group(function () {
//     Route::resource('students', StudentController::class);

// });

// });


Route::middleware('admin.auth')->group(function() {
    Route::resource('teacher', TeacherController::class);
});

Route::middleware('teacher')->group(function() {
    Route::resource('attendance', AttendanceController::class);
    Route::resource('students', StudentController::class);
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
  $request->fulfill();
  return redirect('/students')->with('success', 'Email verified....');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function(Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent');
})->middleware(['auth','throttle:6,1'])->name('verification.send');


//for password reset
Route::middleware('guest')->group(function (){

Route::get('forgot-password', function(){
    return view('auth.forgot-password');
})->name('password.request');


Route::post('forgot-password', function(Request $request){
    $request->validate(['email'=>'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::ResetLinkSent ?
       back()->with(['status' => __($status)]) :
       back()->withErrors(['email' => __($status)]);
})->name('password.email');


Route::get('/reset-password/{token}', function(string $token){
    return view('auth.reset-password', ['token'=> $token]);
})->name('password.reset');

 });
