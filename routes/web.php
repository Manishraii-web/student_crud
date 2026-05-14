<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Route::get('students', [StudentController::class, 'index'])->name('students.index');
// Route::post('students', [StudentController::class, 'store'])->name('students.store');
// Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');
// Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
// Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('students', StudentController::class);
