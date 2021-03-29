<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');


Route::group([
    'middleware' => 'auth:api',
    'namespace' => 'Api',
], function () {
    Route::get('user/info', [UserController::class, 'info']);
});

