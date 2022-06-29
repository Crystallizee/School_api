<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('users/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
route::resource('users', UserController::class);
Route::patch('users/{id}', [UserController::class, 'update']);
route::post('/login', [LoginController::class,'login']);
route::post('/logout', [LoginController::class,'logout']);

Route::resource('/teacher', TeacherController::class);
Route::resource('/student', StudentController::class);