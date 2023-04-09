<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\AdminOrTeacher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});
Route::get('/login', function () {return view('welcome');});
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard'); });
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

    Route::get('/courses/create', [CourseController::class, 'create'])
         ->middleware(['admin_or_teacher'])
         ->name('courses.create');
         
    Route::post('/courses', [CourseController::class, 'store'])
         ->middleware(['admin_or_teacher'])
         ->name('courses.store');
         
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])
         ->middleware(['admin_or_teacher'])
         ->name('courses.edit');
         
    Route::put('/courses/{course}', [CourseController::class, 'update'])
         ->middleware(['admin_or_teacher'])
         ->name('courses.update');
         
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])
         ->middleware(['admin_or_teacher'])
         ->name('courses.destroy');
         
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



