<?php

use App\Http\Controllers\LanguageController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::get('/user',[\App\Http\Controllers\UserController::class, 'index']);
	Route::post('/storePercentLanguages',[\App\Http\Controllers\UserLanguagesController::class,'storePercent']);
	Route::put('/updatePercentLanguages', [\App\Http\Controllers\UserLanguagesController::class,'updatePercent']);
	Route::post('/storePercentSkills',[\App\Http\Controllers\UserSkillsController::class,'storePercent']);
	Route::put('/updatePercentSkills', [\App\Http\Controllers\UserSkillsController::class,'updatePercent']);
	
});

Route::middleware(['auth:sanctum','admin'])->group(function () {
	Route::get('/admin/users', [\App\Http\Controllers\SuperAdminController::class, 'index']);
	Route::get('/admin/user/{id}', [\App\Http\Controllers\SuperAdminController::class, 'userId']);
	Route::get('/admin/delete/{id}', [\App\Http\Controllers\SuperAdminController::class, 'deleteUser']);
	Route::post('/admin/create', [\App\Http\Controllers\SuperAdminController::class, 'createUser']);
	// Other routes for admins...
});
//Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
//    Route::post('login','login');
//    Route::post('store','store');
//});

Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('store', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('/auth/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/languages', [\App\Http\Controllers\LanguageController::class, 'index']);
Route::get('/skills', [\App\Http\Controllers\SkillController::class, 'index']);
//Route::get('/admin/users', [\App\Http\Controllers\SuperAdminController::class, 'index']);
//Route::get('/admin/user/{id}', [\App\Http\Controllers\SuperAdminController::class, 'userId']);


