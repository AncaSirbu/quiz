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
    return view('create');
});

Route::prefix('quiz')
    ->group(function (){
        Route::get('/create', 'QuizAnswerController@create')
            ->name('quiz_answer.create');

        Route::post('/', 'QuizAnswerController@store')
            ->name('quiz_answer.store');

    });
