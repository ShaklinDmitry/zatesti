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


Route::post('/user', [\App\Http\Controllers\RegisterUserController::class, 'register']);

Route::patch('/user/loggedStatus', [\App\Http\Controllers\LoginUserController::class, 'login']);

Route::post('/test', [\App\Http\Controllers\CreateTestController::class, 'createTest']);

Route::get('/test/questions', [\App\Http\Controllers\GetTestsController::class, 'getTestQuestions']);

Route::post('/question', [\App\Http\Controllers\QuestionController::class, 'create']);
