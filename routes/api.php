<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobTypeController;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WorkConditionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('login', 'ApiController@login');
Route::post('login', [ApiController::class, 'login']);
Route::post('register', [ApiController::class, 'register']);
//Route::post('register', 'ApiController@register');

// Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
//     Route::get('category', [CategoryController::class, 'index']);
//     Route::post('category-save', [CategoryController::class, 'store']);
//     Route::put('category-update/{id}', [CategoryController::class, 'update']);
//     Route::delete('category-delete/{id}', [CategoryController::class, 'delete']);
// });


Route::group(['middleware' => 'auth.jwt', 'admin'], function () {
    Route::get('logout', [ApiController::class, 'logout']);
    
    Route::get('user', [ApiController::class, 'getAuthUser']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::post('category-save', [CategoryController::class, 'store']);
    Route::get('category-show/{id}', [CategoryController::class, 'show']);
    Route::put('category-update/{id}', [CategoryController::class, 'update']);
    Route::delete('category-delete/{id}', [CategoryController::class, 'delete']);

    Route::get('jobType', [JobTypeController::class, 'index']);
    Route::post('jobType-save', [JobTypeController::class, 'store']);
    Route::get('jobType-show/{id}', [JobTypeController::class, 'show']);
    Route::put('jobType-update/{id}', [JobTypeController::class, 'update']);
    Route::delete('jobType-delete/{id}', [JobTypeController::class, 'delete']);

    Route::get('workCondition', [WorkConditionController::class, 'index']);
    Route::post('workCondition-save', [WorkConditionController::class, 'store']);
    Route::get('workCondition-show/{id}', [WorkConditionController::class, 'show']);
    Route::put('workCondition-update/{id}', [WorkConditionController::class, 'update']);
    Route::delete('workCondition-delete/{id}', [WorkConditionController::class, 'delete']);

    Route::get('job', [JobController::class, 'index']);
    Route::post('job-save', [JobController::class, 'store']);
    Route::get('job-show/{id}', [JobController::class, 'show']);
    Route::put('job-update/{id}', [JobController::class, 'update']);
    Route::delete('job-delete/{id}', [JobController::class, 'delete']);

    Route::get('search-job/{job_name}', [JobController::class, 'search']);
    
});

