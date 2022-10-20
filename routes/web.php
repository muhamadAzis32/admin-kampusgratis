<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\QuizController;
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

// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout']);

// Bisa di akses jika login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard-admin', [DashboardController::class, 'index']);

    // students
    Route::get('/students', [StudentsController::class, 'index']);
    Route::get('/students-create', [StudentsController::class, 'create']);
    Route::post('/students-store', [StudentsController::class, 'store']);
    Route::get('/students-edit/{id}', [StudentsController::class, 'edit']);
    Route::post('/students-update/{id}', [StudentsController::class, 'update']);
    Route::get('/students-destroy/{id}', [StudentsController::class, 'destroy']);

    // lecturers
    Route::get('/lecturers', [LecturersController::class, 'index']);
    Route::get('/lecturers-create', [LecturersController::class, 'create']);
    Route::post('/lecturers-store', [LecturersController::class, 'store']);
    Route::get('/lecturers-edit/{id}', [LecturersController::class, 'edit']);
    Route::post('/lecturers-update/{id}', [LecturersController::class, 'update']);
    Route::get('/lecturers-destroy/{id}', [LecturersController::class, 'destroy']);

    // administration
    Route::get('/verifyUser', [VerifyController::class, 'index']);
    Route::post('/verifyUser-verify/{id}', [VerifyController::class, 'verify']);
    Route::get('/verifyUser-files/{id}', [VerifyController::class, 'files']);
    Route::get('/download/{filename}', [VerifyController::class, 'downloadFile']);

    // major
    Route::get('/majors', [MajorController::class, 'index']);
    Route::get('/majors-create', [MajorController::class, 'create']);
    Route::post('/majors-store', [MajorController::class, 'store']);
    Route::get('/majors-edit/{id}', [MajorController::class, 'edit']);
    Route::post('/majors-update/{id}', [MajorController::class, 'update']);
    Route::get('/majors-destroy/{id}', [MajorController::class, 'destroy']);

    // subject
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/subjects-create', [SubjectController::class, 'create']);
    Route::post('/subjects-store', [SubjectController::class, 'store']);
    Route::get('/subjects-edit/{id}', [SubjectController::class, 'edit']);
    Route::post('/subjects-update/{id}', [SubjectController::class, 'update']);
    Route::get('/subjects-destroy/{id}', [SubjectController::class, 'destroy']);

    // modules
    Route::get('/modules', [ModuleController::class, 'index']);
    Route::get('/modules-create', [ModuleController::class, 'create']);
    Route::post('/modules-store', [ModuleController::class, 'store']);
    Route::get('/modules-edit/{id}', [ModuleController::class, 'edit']);
    Route::post('/modules-update/{id}', [ModuleController::class, 'update']);
    Route::get('/modules-destroy/{id}', [ModuleController::class, 'destroy']);

    // session
    Route::get('/session', [SessionController::class, 'index']);
    Route::get('/session-create', [SessionController::class, 'create']);
    Route::post('/session-store', [SessionController::class, 'store']);
    Route::get('/session-edit/{id}', [SessionController::class, 'edit']);
    Route::post('/session-update/{id}', [SessionController::class, 'update']);
    Route::get('/session-destroy/{id}', [SessionController::class, 'destroy']);

    // assignment
    Route::get('/assignment', [AssignmentController::class, 'index']);
    Route::get('/assignment-create', [AssignmentController::class, 'create']);
    Route::post('/assignment-store', [AssignmentController::class, 'store']);
    Route::get('/assignment-edit/{id}', [AssignmentController::class, 'edit']);
    Route::post('/assignment-update/{id}', [AssignmentController::class, 'update']);
    Route::get('/assignment-destroy/{id}', [AssignmentController::class, 'destroy']);

    // Admin
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-create', [AdminController::class, 'create']);
    Route::post('/admin-store', [AdminController::class, 'store']);
    Route::get('/admin-destroy/{id}', [AdminController::class, 'destroy']);

    // Document
    Route::get('/document', [DocumentController::class, 'index']);
    Route::get('/document-create', [DocumentController::class, 'create']);
    Route::post('/document-store', [DocumentController::class, 'store']);
    Route::get('/document-edit/{id}', [DocumentController::class, 'edit']);
    Route::get('/document-destroy/{id}', [DocumentController::class, 'destroy']);
    Route::post('/document-update/{id}', [DocumentController::class, 'update']);

    //Video
    Route::get('/video', [VideoController::class, 'index']);
    Route::get('/video-create', [VideoController::class, 'create']);
    Route::post('/video-store', [VideoController::class, 'store']);
    Route::get('/video-destroy/{id}', [VideoController::class, 'destroy']);
    Route::get('/video-edit/{id}', [VideoController::class, 'edit']);
    Route::post('/video-update/{id}', [VideoController::class, 'update']);

    //KRS
    Route::get('/krs', [KRSController::class, 'index']);
    Route::get('/krs-create', [KRSController::class, 'create']);
    Route::post('/krs-store', [KRSController::class, 'store']);
    Route::get('/krs-destroy/{id}', [KRSController::class, 'destroy']);
    Route::get('/krs-edit/{id}', [KRSController::class, 'edit']);
    Route::post('/krs-update/{id}', [KRSController::class, 'update']);
    
       //Certificate
    Route::get('/certificate', [CertificateController::class, 'index']);
    Route::get('/certificate-create', [CertificateController::class, 'create']);
    Route::post('/certificate-store', [CertificateController::class, 'store']);
    Route::put('/certificate-edit', [CertificateController::class, 'edit']);
    
      //Quiz
    Route::get('/quiz', [QuizController::class, 'index']);
    Route::get('/quiz-create', [QuizController::class, 'create']);
    Route::get('/quiz-refetch/{id}', [QuizController::class, 'getMajorSubject']);
    Route::post('/quiz-store', [QuizController::class, 'store']);
    Route::get('/quiz-destroy/{id}', [QuizController::class, 'destroy']);
    Route::get('/quiz-edit/{id}', [QuizController::class, 'edit']);
    Route::post('/quiz-update/{id}', [QuizController::class, 'update']);


});
// Tidak perlu login pun bisa di akses :)
Route::get('/test', function () {
    return view('admin.Table');
});
