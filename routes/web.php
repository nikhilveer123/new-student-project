<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');




Route::prefix('student')->middleware('auth')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::get('{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('{student}', [StudentController::class, 'update'])->name('student.update');
    Route::get('{student}', [StudentController::class, 'show'])->name('student.show');
    Route::delete('{student}', [StudentController::class, 'deleteStudent'])->name('student.destroy');
});


Route::prefix('teacher')->middleware('auth')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');


});


