<?php

use App\Http\Controllers\studentsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});
Route::resource('/students',studentsController::class);




