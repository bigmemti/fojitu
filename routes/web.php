<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\HomeWorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('teacher.course', CourseController::class)->shallow();
    Route::get('/course', [CourseListController::class, 'index'])->name('course.index');
    Route::resource('course.session', SessionController::class,['except' => ['index']])->shallow();
    Route::resource('session.topic', TopicController::class,['except' => ['index']])->shallow();
    Route::resource('session.homework', HomeWorkController::class,['except' => ['index']])->shallow();

    Route::resource('user.teacher', TeacherController::class)->shallow();
});

require __DIR__.'/auth.php';



