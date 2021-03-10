<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\SendMailController;
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


Route::get('/', [TaskController::class, 'index'])->name('tasks.index')->middleware(['auth','verified']);
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create')->middleware('auth');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');
Route::get('/tasks/show/{id}', [TaskController::class, 'show'])->name('tasks.show')->middleware('auth');
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit')->middleware('auth');
Route::put('/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update')->middleware('auth');
Route::delete('/tasks/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete')->middleware('auth');

//email ending

Route::get('/send-mail', [SendMailController::class, 'index'])->name('send.mail.index');








Auth::routes(['verify' => true]	);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//user email verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');