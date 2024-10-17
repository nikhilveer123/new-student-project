<?php

use App\Http\Controllers\StudentController;
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




Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::get('{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('{id}', [StudentController::class, 'show'])->name('student.show');
    Route::delete('{id}', [StudentController::class, 'destroy'])->name('student.destroy');

});


