<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
//    Route::post('login','login');
//    Route::post('store','store');
//});

Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('store', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/auth/login', [\App\Http\Controllers\UserController::class, 'login']);