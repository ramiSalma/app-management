<?php

use App\Http\Controllers\studentsController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $studentsCount = DB::table('students')->count();
    $teachersCount = DB::table('teachers')->count();
    $coursesCount = DB::table('courses')->count();
    $topTeachers = DB::table('courses')
    ->select('teachers.name', DB::raw('COUNT(courses.id) as total_courses'))
    ->join('teachers', 'courses.teacher_id', '=', 'teachers.id')
    ->groupBy('teachers.id', 'teachers.name')
    ->orderByDesc('total_courses')
    ->limit(5)
    ->get();
    return view('layout', compact('studentsCount', 'teachersCount', 'coursesCount','topTeachers'));

});




// Route::get('student/login', [AuthController::class, 'showLoginForm'])->name('form-login');
// Route::post('student/login', [AuthController::class, 'login'])->name('login');
// Route::post('student/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth:student'])->group(function () {
// });
Route::resource('/students',studentsController::class);
Route::resource('/teachers',teacherController::class);