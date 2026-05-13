<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
