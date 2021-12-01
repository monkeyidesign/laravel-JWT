<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Routes for guests only
Route::group(['middleware' => ['guest:api']], function(){
    Route::post('register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);

//    Route::post('verification/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
//    Route::post('verification/resend', 'Auth\VerificationController@resend');
//    Route::post('login', 'Auth\LoginController@login');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

// Route group for authenticated users only
Route::group(['middleware' => ['auth:api']], function(){
    Route::post('me', [\App\Http\Controllers\Auth\AuthController::class, 'me']);
    Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\Auth\AuthController::class, 'refresh']);
//    Route::put('settings/profile', 'User\SettingsController@updateProfile');
//    Route::put('settings/password', 'User\SettingsController@updatePassword');
});

