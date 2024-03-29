<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MimeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeWorkController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\FileableController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\FileAdditionController;
use App\Http\Controllers\TeacherRequestController;

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

Route::view('/', 'welcome');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('user.teacher', TeacherController::class)->shallow();
    Route::resource('user.teacher_request', TeacherRequestController::class,['except'=>['index']])->shallow();
    Route::get('/teacher_request', [TeacherRequestController::class, 'index'])->name('teacher_request.index');
    Route::resource('user.student', StudentController::class)->shallow();

    Route::resource('institution', InstitutionController::class);
    Route::resource('major', MajorController::class);
    Route::resource('type', TypeController::class);
    Route::resource('type.mime', MimeController::class)->shallow();
    Route::resource('curriculum', CurriculumController::class);

    Route::resource('teacher.course', CourseController::class)->shallow();
    Route::get('/course', [CourseListController::class, 'index'])->name('course.index');
    Route::get('curriculum/{curriculum}/course', [CourseListController::class, 'curriculum'])->name('curriculum.course.index');
    Route::resource('course.session', SessionController::class,['except' => ['index']])->shallow();
    Route::resource('session.topic', TopicController::class,['except' => ['index']])->shallow();
    Route::resource('session.homework', HomeWorkController::class,['except' => ['index']])->shallow();
    Route::resource('homework.submission', SubmissionController::class)->shallow();
    Route::resource('topic.practice', PracticeController::class,['except' => ['index']])->shallow();
    Route::resource('session.attendance', AttendanceController::class)->shallow();
    Route::get('/file/{file}/download', [FileAdditionController::class, 'download'])->name('file.download');
    Route::get('/file/{file}/image', [FileAdditionController::class, 'image'])->name('file.image');
    Route::resource('fileable', FileableController::class);


    Route::resource('course.member', MemberController::class)->shallow();
});

require __DIR__.'/auth.php';



