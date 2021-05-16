<?php

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

Auth::routes();

Route::redirect('/', 'login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth',
    'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/student', 'UserController')->names('student');
    Route::resource('/center', 'EducationCenterController')->names('center');
    Route::resource('/subject', 'SubjectController')->names('subject');
    Route::resource('/test', 'TestController')->names('test');
    Route::resource('/question', 'QuestionController')->names('question');
});

Auth::routes();
