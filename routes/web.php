<?php

use App\Http\Controllers\studentsController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TpController;
use App\Models\Student;
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


    $stats = Student::selectRaw("
            COUNT(CASE WHEN gender = 'male' THEN 1 END) as male_count,
            COUNT(CASE WHEN gender = 'female' THEN 1 END) as female_count,
            AVG(CASE WHEN gender = 'male' THEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) END) as avg_male_age,
            AVG(CASE WHEN gender = 'female' THEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) END) as avg_female_age
        ")
        ->first();

    $labels = ['Male', 'Female'];
    $studentsCountGender = [$stats->male_count, $stats->female_count];
    $avgAges = [round($stats->avg_male_age, 1) ?? 0, round($stats->avg_female_age, 1) ?? 0];

    //return view('dashboard', compact('labels', 'studentsCount', 'avgAges'));

    
    return view('layout', compact('studentsCount', 'teachersCount', 'coursesCount','topTeachers','labels','studentsCountGender','avgAges'));

});




// Route::get('student/login', [AuthController::class, 'showLoginForm'])->name('form-login');
// Route::post('student/login', [AuthController::class, 'login'])->name('login');
// Route::post('student/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth:student'])->group(function () {
// });
Route::resource('/students',studentsController::class);
Route::resource('/teachers',teacherController::class);
Route::resource('/courses',TpController::class);