<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('home');
})->name('home')->middleware(['guest']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('subject')->middleware('is_subject')->group(function(){
        Route::get('/dashboard', [SubjectController::class, 'index'])->name('subject.dashboard');
        Route::get('/sendpage', [SubjectController::class, 'sendpage'])->name('sendpage');
        Route::post('/send', [SubjectController::class, 'store'])->name('subjectsave');
        Route::get('/sended/{id}', [SubjectController::class, 'sended'])->name('sended');
        Route::get('/sendedform2/{id}', [SubjectController::class, 'sendedform2'])->name('sendedform2');
        Route::get('/show/{id}/{file_id}', [SubjectController::class, 'show'])->name('showfile');
        Route::get('/showform2/{id}/{file_id}', [SubjectController::class, 'showform2'])->name('showform2');
        Route::get('/resend/{id}', [SubjectController::class, 'resend'])->name('resend');
        Route::post('/resendsave/{id}', [SubjectController::class, 'resendsave'])->name('resendsave');
        Route::get('/resendform2/{id}', [SubjectController::class, 'resendform2'])->name('resendform2');
        Route::post('/resendform2save/{id}', [SubjectController::class, 'resendform2save'])->name('resendform2save');
        Route::get('/tugallangan', [SubjectController::class, 'tugallangan'])->name('tugallangan');
        Route::post('/storetugallangan', [SubjectController::class, 'storetugallangan'])->name('storetugallangan');
        Route::get('/downloaded/{data:filename}', [SubjectController::class, 'download'])->name('downloaded');
        Route::get('/malumot', [SubjectController::class, 'malumot'])->name('malumot');
        Route::get('/malumot6oy/{data:id}', [SubjectController::class, 'malumot6oy'])->name('malumot6oy');
        Route::delete('/deletesubjects/{id}', [SubjectController::class, 'deletesubjects'])->name('deletesubjects');
    });

    Route::prefix('object')->middleware('is_object')->group(function(){
        Route::get('/dashboard', [ObjectController::class, 'index'])->name('object.dashboard');
        Route::get('/showform1/{id}/{file_id}', [ObjectController::class, 'showform1'])->name('showform1');
        Route::get('/show/{id}/{file_id}', [ObjectController::class, 'show'])->name('show');
        Route::get('/download/{data:filename}', [ObjectController::class, 'download'])->name('download');
        Route::get('/reject/{data:id}', [ObjectController::class, 'reject'])->name('reject');
        Route::post('/resendback/{data:id}', [ObjectController::class, 'resendback'])->name('resendback');
        Route::get('/rejectform2/{data:id}', [ObjectController::class, 'rejectform2'])->name('rejectform2');
        Route::post('/storeform2/{data:id}', [ObjectController::class, 'storeform2'])->name('storeform2');
        Route::get('/form1', [ObjectController::class, 'form1'])->name('form1');
        Route::get('/form2', [ObjectController::class, 'form2'])->name('form2');
        Route::get('/approve/{id}', [ObjectController::class, 'approve'])->name('approve');
        Route::get('/approveform2/{id}', [ObjectController::class, 'approveform2'])->name('approveform2');
        Route::get('/malumotyarim', [ObjectController::class, 'malumotyarim'])->name('malumotyarim');
        Route::get('/malumotyarimyil/{data:id}', [ObjectController::class, 'malumotyarimyil'])->name('malumotyarimyil');
        Route::delete('/deletesubject/{id}', [ObjectController::class, 'deletesubject'])->name('deletesubject');
        
    });
});

