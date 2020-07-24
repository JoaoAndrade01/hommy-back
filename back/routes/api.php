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

Route::post('createRepublic','RepublicController@createRepublic');
Route::get('showRepublic/{id}','RepublicController@showRepublic');
Route::get('listRepublic','RepublicController@listRepublic');
Route::put('updateRepublic/{id}','RepublicController@uptadeRepublic');
Route::delete('deleteRepublic/{id}','RepublicController@deleteRepublic');
Route::put('addRepublic/{user_id}/{republic_id}', 'RepublicController@addRepublic');
Route::put('removeRepublic/{user_id}/{republic_id}', 'RepublicController@removeRepublic');

Route::post('createUser', 'UserController@createUser');
Route::get('showUser/{id}', 'UserController@showUser');
Route::get('listUser', 'UserController@listUser');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');