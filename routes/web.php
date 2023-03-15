<?php

use Illuminate\Support\Facades\Route;


//route resource
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('groups', App\Http\Controllers\GroupController::class);
    Route::resource('members', App\Http\Controllers\MemberController::class);
    Route::resource('schedules', App\Http\Controllers\scheduleController::class);
    Route::resource('presences', App\Http\Controllers\PresenceController::class);
    Route::resource('quizes', App\Http\Controllers\quizesController::class);
    Route::get('/bankSoal',[App\Http\Controllers\quizesController::class,'bankSoal']);
    Route::resource('topic', 'App\Http\Controllers\TopicController');
    Route::get('/surveys', [App\Http\Controllers\SurveysController::class, 'index']);
    Route::post('/surveys', [App\Http\Controllers\SurveysController::class, 'store']);   
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('quiz/quizes', 'App\Http\Controllers\quizesController');
