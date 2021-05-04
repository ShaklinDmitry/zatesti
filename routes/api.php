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

Route::get('/animal/add','AnimalController@create');
Route::post('/animal/add',[\App\Http\Controllers\AnimalController::class, 'store']);
Route::get('/animal/car','AnimalController@index');
Route::get('/animal/edit/{id}','AnimalController@edit');
Route::post('/animal/edit/{id}','AnimalController@update');
Route::delete('/animal/delete/{id}','AnimalController@destroy');

