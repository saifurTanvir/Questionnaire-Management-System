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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaire/create', 'QuestionnaireController@create')->name('questionnaire.create');
Route::post('/questionnaire/store', 'QuestionnaireController@store')->name('questionnaire.store');
Route::get('/questionnaire/show/{questionnaire}', 'QuestionnaireController@show')->name('questionnaire.show');

Route::get('/questionnaires/{questionnaire}/question/create', 'QuestionController@create')->name('question.create');
Route::post('/questionnaires/{questionnaire}/question/create', 'QuestionController@store')->name('question.store');


