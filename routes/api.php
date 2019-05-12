<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::get('/quizs', 'QuizController@index')->name('api.quiz.index');
    Route::get('/quiz/{quiz}', 'QuizController@show')->name('api.quiz.show');
    Route::post('/answer/create', 'AnswerController@store')->name('api.answer.create');
});
