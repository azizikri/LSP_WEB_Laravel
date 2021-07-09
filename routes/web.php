<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeachingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/register', [HomeController::class, 'register']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/siswa', [HomeController::class, 'siswa'])->name('home.siswa');
Route::get('/guru', [HomeController::class, 'guru'])->name('home.guru');
Route::get('/nilai', [HomeController::class, 'nilai'])->name('home.nilai');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('admin/major', [MajorController::class, 'index'])->name('major.index');
Route::post('admin/major', [MajorController::class, 'store'])->name('major.store');
Route::get('admin/major/edit/{major}', [MajorController::class, 'edit'])->name('major.edit');
Route::patch('admin/major/{major}', [MajorController::class, 'update'])->name('major.update');
Route::delete('admin/major/{major}', [MajorController::class, 'destroy'])->name('major.delete');

Route::get('admin/classroom', [ClassroomController::class, 'index'])->name('classroom.index');
Route::post('admin/classroom', [ClassroomController::class, 'store'])->name('classroom.store');
Route::get('admin/classroom/edit/{classroom}', [ClassroomController::class, 'edit'])->name('classroom.edit');
Route::patch('admin/classroom/{classroom}', [ClassroomController::class, 'update'])->name('classroom.update');
Route::delete('admin/classroom/{classroom}', [ClassroomController::class, 'destroy'])->name('classroom.delete');

Route::get('admin/subject', [SubjectController::class, 'index'])->name('subject.index');
Route::post('admin/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::get('admin/subject/edit/{subject}', [SubjectController::class, 'edit'])->name('subject.edit');
Route::patch('admin/subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('admin/subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.delete');

Route::get('admin/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('admin/teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('admin/teacher/edit/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::patch('admin/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('admin/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.delete');

Route::get('admin/student', [StudentController::class, 'index'])->name('student.index');
Route::post('admin/student', [StudentController::class, 'store'])->name('student.store');
Route::get('admin/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::patch('admin/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('admin/student/{student}', [StudentController::class, 'destroy'])->name('student.delete');

Route::get('admin/teaching', [TeachingController::class, 'index'])->name('teaching.index');
Route::post('admin/teaching', [TeachingController::class, 'store'])->name('teaching.store');
Route::get('admin/teaching/edit/{teaching}', [TeachingController::class, 'edit'])->name('teaching.edit');
Route::patch('admin/teaching/{teaching}', [TeachingController::class, 'update'])->name('teaching.update');
Route::delete('admin/teaching/{teaching}', [TeachingController::class, 'destroy'])->name('teaching.delete');

Route::get('admin/grade', [GradeController::class, 'index'])->name('grade.index');
Route::post('admin/grade', [GradeController::class, 'store'])->name('grade.store');
Route::get('admin/grade/edit/{grade}', [GradeController::class, 'edit'])->name('grade.edit');
Route::patch('admin/grade/{grade}', [GradeController::class, 'update'])->name('grade.update');
Route::delete('admin/grade/{grade}', [GradeController::class, 'destroy'])->name('grade.delete');


