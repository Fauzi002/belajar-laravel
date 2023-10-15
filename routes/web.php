<?php

use App\Models\Teacher;
use App\Models\Extracuricular;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracuricularController;
use Illuminate\Support\Facades\Auth;

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
    return view('home', ['title' => 'Home']);
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-add', [StudentController::class, 'create'])->middleware(['auth', 'must-admin-or-teacher']);
Route::post('/student', [StudentController::class, 'store'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware(['auth', 'must-admin-or-teacher']);
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-delete/{id}', [StudentController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware(['auth', 'must-admin']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware(['auth', 'must-admin']);

Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'show'])->middleware('auth');
Route::get('/class-add', [ClassController::class, 'create'])->middleware(['auth', 'must-admin']);
Route::post('/class-save', [ClassController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('/class-edit/{id}', [ClassController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/class/{id}', [ClassController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/class-delete/{id}', [ClassController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/class-destroy/{id}', [ClassController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/class-deleted', [ClassController::class, 'deletedClass'])->middleware(['auth', 'must-admin']);
Route::get('/class/{id}/restore', [ClassController::class, 'restore'])->middleware(['auth', 'must-admin']);

Route::get('/extracuricular', [ExtracuricularController::class, 'index'])->middleware('auth');
Route::get('/extracuricular/{id}', [ExtracuricularController::class, 'show'])->middleware('auth');
Route::get('/extracuricular-add', [ExtracuricularController::class, 'create'])->middleware(['auth', 'must-admin']);;
Route::post('/extracuriculars', [ExtracuricularController::class, 'store'])->middleware(['auth', 'must-admin']);;
Route::get('/extracuricular-edit/{id}', [ExtracuricularController::class, 'edit'])->middleware(['auth', 'must-admin']);;
Route::put('/extracuricular/{id}', [ExtracuricularController::class, 'update'])->middleware(['auth', 'must-admin']);;
Route::get('/extracuricular-delete/{id}', [ExtracuricularController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/extracuricular-destroy/{id}', [ExtracuricularController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/extracuricular-deleted', [ExtracuricularController::class, 'deletedExtracuricular'])->middleware(['auth', 'must-admin']);
Route::get('/extracuricular/{id}/restore', [ExtracuricularController::class, 'restore'])->middleware(['auth', 'must-admin']);

Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-add', [TeacherController::class, 'create'])->middleware(['auth', 'must-admin']);
Route::post('/teachers', [TeacherController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-delete/{id}', [TeacherController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/teacher-destroy/{id}', [TeacherController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-deleted', [TeacherController::class, 'deletedTeacher'])->middleware(['auth', 'must-admin']);
Route::get('/teacher/{id}/restore', [TeacherController::class, 'restore'])->middleware(['auth', 'must-admin']);

