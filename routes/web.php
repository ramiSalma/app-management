<?php

use App\Http\Controllers\studentsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});




Route::get('student/login', [AuthController::class, 'showLoginForm'])->name('form-login');
Route::post('student/login', [AuthController::class, 'login'])->name('login');
Route::post('student/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:student'])->group(function () {
    Route::resource('/students',studentsController::class);
});