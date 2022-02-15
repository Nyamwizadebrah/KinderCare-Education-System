<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\PupilController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//pupils
Route::resource('pupils', PupilController::class);
Route::get('/actonpupil/{id}/{status}', [PupilController::class, 'act'])->name('actonpupil.act');
//pupils

//teachers
Route::resource('teachers', TeacherController::class);
//teachers

//assignment
Route::resource('assignment', AssignmentController::class);
//assignment

//marks
Route::resource('marks', MarksController::class);
Route::get('/reports/attempts',[MarksController::class,'attemptsSummary'])->name('reports.attempts');
Route::get('/reports/assignments/{id}',[MarksController::class,'assignmentSummary'])->name('reports.assignmentAttemptsSummary');
Route::get('/reports/comment/{id}',[MarksController::class,'addComment']);
Route::get('/reports/assignments/{assignmentId}/{pupilId}',[MarksController::class,'addPupilComment']);
Route::post('/reports/assignment/comment',[MarksController::class,'comment'])->name('reports.assignment.comment');
Route::post('/reports/assignment/comment/pupil',[MarksController::class,'commentPupil'])->name('reports.assignment.pupil.comment');
//marks

//comments
Route::resource('comments', CommentController::class);
//comments
 