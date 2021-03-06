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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [\App\Http\Controllers\RegisterUserController::class, 'register']);

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::get('/view', function () {
    return view('exmpl');
});

Route::post('/createTest', [\App\Http\Controllers\CreateTestController::class, 'createTest']);

Route::post('/email', function (){
    \Illuminate\Support\Facades\Mail::to('b1a98f7538-7dc730@inbox.mailtrap.io')->send(new \App\Mail\RegistartionConfirmationEmail());
});
