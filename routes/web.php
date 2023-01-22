<?php

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

Route::get('/', function () {
    return view('users.dashboard');
});

Auth::routes();

Route::get('/user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('home');
Route::get('/user/form', [App\Http\Controllers\User\UserController::class, 'studentForm'])->name('user.student_form');
Route::get('/user/form/biodata', [App\Http\Controllers\User\UserController::class, 'studentBiodata'])->name('user.student.student_biodata');
Route::get('/user/form/score-presence', [App\Http\Controllers\User\UserController::class, 'studentScorePresence'])->name('user.student.student_score_presence');
Route::get('/user/form/biodata-parent', [App\Http\Controllers\User\UserController::class, 'studentBiodataParent'])->name('user.student.biodata_parent');
Route::get('/user/form/document', [App\Http\Controllers\User\UserController::class, 'studentDocument'])->name('user.student.student_document');
Route::post('/user/store/biodata', [App\Http\Controllers\User\UserController::class, 'storeOrUpdateStudent'])->name('user.store_biodata');
Route::post('/user/store/school-origin', [App\Http\Controllers\User\UserController::class, 'storeOrUpdateStudentSchoo;'])->name('user.store_school_origin');
Route::post('/user/store/score', [App\Http\Controllers\User\UserController::class, 'storeOrUpdateScoreStudent'])->name('user.store_score_student');
Route::post('/user/store/presence', [App\Http\Controllers\User\UserController::class, 'storeOrUpdatePresence'])->name('user.store_presence');
Route::post('/user/store/father', [App\Http\Controllers\User\UserController::class, 'storeOrUpdateFatherStudent'])->name('user.store_father');
Route::post('/user/store/mother', [App\Http\Controllers\User\UserController::class, 'storeOrUpdateMotherStudent'])->name('user.store_mother');
Route::post('/user/store/document', [App\Http\Controllers\User\UserController::class, 'storeOrUpdateDocument'])->name('user.store_document');
