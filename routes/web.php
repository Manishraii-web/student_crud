<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/', function () {
    return redirect()->route('students.index');
});


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
Route::resource('students', StudentController::class);
});
