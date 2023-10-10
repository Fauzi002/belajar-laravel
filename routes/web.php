<?php

use App\Models\Extracuricular;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracuricularController;

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

Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/{id}', [ClassController::class, 'show']);
Route::get('/class-add', [ClassController::class, 'create']);
Route::post('/class-save', [ClassController::class, 'store']);

Route::get('/extracuricular', [ExtracuricularController::class, 'index']);
Route::get('/extracuricular/{id}', [ExtracuricularController::class, 'show']);
Route::get('/extracuricular-add', [ExtracuricularController::class, 'create']);
Route::post('/extracuriculars', [ExtracuricularController::class, 'store']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher/{id}', [TeacherController::class, 'show']);
Route::get('/teacher-add', [TeacherController::class, 'create']);
Route::post('/teachers', [TeacherController::class, 'store']);
