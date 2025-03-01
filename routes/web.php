<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PersonalController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (){
    return Inertia::render('App', ['title' => 'Главная страница']);
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'RedirectToLoginPage'])->name('RedirectToLoginPage');
    Route::post('/login', [AuthController::class, 'LoginUser'])->name('LoginUser');
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class, 'RedirectToRegisterPage'])->name('RedirectToRegisterPage');
    Route::post('/register', [AuthController::class, 'RegisterUser'])->name('RegisterUser');
});

Route::get('/logout', [AuthController::class, 'LogoutUser'])->name('LogoutUser')->middleware('auth');

//Routes to courses pages * Маршруты на страницы курсов
    //Routes to page for all courses * Маршруты на страницу всех курсов
    Route::get('/courses', [CourseController::class, 'redirectToPageCourses'])->name('courses');
    //Route to details of course * Маршрут на детали курса
Route::get('courses/{id}', [CourseController::class, 'redirectToCurrentPageCourse'])->name('course');

//Routes to pages for teachers * Маршруты на страницы преподавателей
    //Routes to page for all teachers * Маршруты на страницу всех преподавателей
Route::get('/teachers', [TeacherController::class, 'redirectToPageTeachers'])->name('teachers');
    //Route to details of teacher * Маршрут на детали преподавателя
Route::get('/teachers/{id}', [TeacherController::class, 'redirectToCurrentPageTeacher'])->name('teacher');

//Routes to personal pages * Маршруты на страницы личной информации пользователя
    //Routes to personal account page * Маршрут на страницу аккаунта
    Route::middleware('auth')->group(function (){
        Route::get('/account', [PersonalController::class, 'redirectGetInfo'])->name('account');
    });