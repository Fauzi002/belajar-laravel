<?php

use App\Models\Extracuricular;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracuricularController;
use App\Models\Teacher;

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
    return view('home', [
    'name' => 'Mochammad Fauzi Alvarizi',
     'role' => 'admin',
     'title' => 'Home',
     'buah' => ['apel', 'pisang', 'anggur', 'rambutan'],
    ]);
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::get('/student-add', [StudentController::class, 'create']);
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::get('/student-delete/{id}', [StudentController::class, 'delete']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore']);

Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/{id}', [ClassController::class, 'show']);
Route::get('/class-add', [ClassController::class, 'create']);
Route::post('/class-save', [ClassController::class, 'store']);
Route::get('/class-edit/{id}', [ClassController::class, 'edit']);
Route::put('/class/{id}', [ClassController::class, 'update']);
Route::get('/class-delete/{id}', [ClassController::class, 'delete']);
Route::delete('/class-destroy/{id}', [ClassController::class, 'destroy']);
Route::get('/class-deleted', [ClassController::class, 'deletedClass']);
Route::get('/class/{id}/restore', [ClassController::class, 'restore']);

Route::get('/extracuricular', [ExtracuricularController::class, 'index']);
Route::get('/extracuricular/{id}', [ExtracuricularController::class, 'show']);
Route::get('/extracuricular-add', [ExtracuricularController::class, 'create']);
Route::post('/extracuriculars', [ExtracuricularController::class, 'store']);
Route::get('/extracuricular-edit/{id}', [ExtracuricularController::class, 'edit']);
Route::put('/extracuricular/{id}', [ExtracuricularController::class, 'update']);
Route::get('/extracuricular-delete/{id}', [ExtracuricularController::class, 'delete']);
Route::delete('/extracuricular-destroy/{id}', [ExtracuricularController::class, 'destroy']);
Route::get('/extracuricular-deleted', [ExtracuricularController::class, 'deletedExtracuricular']);
Route::get('/extracuricular/{id}/restore', [ExtracuricularController::class, 'restore']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher/{id}', [TeacherController::class, 'show']);
Route::get('/teacher-add', [TeacherController::class, 'create']);
Route::post('/teachers', [TeacherController::class, 'store']);
Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit']);
Route::put('/teacher/{id}', [TeacherController::class, 'update']);
Route::get('/teacher-delete/{id}', [TeacherController::class, 'delete']);
Route::delete('/teacher-destroy/{id}', [TeacherController::class, 'destroy']);
Route::get('/teacher-deleted', [TeacherController::class, 'deletedTeacher']);
Route::get('/teacher/{id}/restore', [TeacherController::class, 'restore']);

