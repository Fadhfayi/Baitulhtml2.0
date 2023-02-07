<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

//route resource
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('groups', App\Http\Controllers\GroupController::class);
    Route::resource('members', App\Http\Controllers\MemberController::class);
    Route::resource('schedules', App\Http\Controllers\scheduleController::class);
    Route::resource('presences', App\Http\Controllers\PresencesController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
