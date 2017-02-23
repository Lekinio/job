<?php

use Illuminate\Http\Request;

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



Route::post('signin',['uses' => 'AuthController@signin']);
Route::post('signup',['uses' => 'AuthController@store']);

Route::get('authenticate/user', 'AuthController@getAuthUser');

Route::post('jobs/create',['uses' => 'JobController@create']);

    Route::get('profile',['uses' => 'AuthController@getAuthUser']);
    Route::get('token',['uses' => 'AuthController@getToken']);
    Route::get('users',['uses' => 'UserController@getAll']);
    Route::get('company',['uses' => 'CompanyController@getAll']);

    Route::get('users/{id}',['uses' => 'UserController@getByID']);


Route::get('jobs',['uses' => 'JobController@getAll']);
Route::delete('jobs/{id}',['uses' => 'JobController@destroy']);



