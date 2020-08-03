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

Route::post('createRepublic', 'RepublicController@createRepublic');
Route::get('showRepublic/{id}', 'RepublicController@showRepublic');
Route::get('listRepublic', 'RepublicController@listRepublic');
Route::put('updateRepublic/{id}', 'RepublicController@updateRepublic');


Route::get('deletedRepublic', 'RepublicController@deletedRepublic');
Route::put('restoreRepublic/{id}', 'RepublicController@restoreRepublic');
Route::put('restoreAllRepublic', 'RepublicController@restoreAllRepublic');

Route::get('locatario/{id}', 'RepublicController@locatario');
Route::get('locador/{id}', 'RepublicController@locador');
Route::get('commentRepublic/{id}', 'RepublicController@commentRepublic');

Route::post('search', 'RepublicController@search');

Route::post('createUser', 'UserController@createUser');
Route::get('showUser/{id}', 'UserController@showUser');
Route::get('listUser', 'UserController@listUser');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');
Route::put('alugar/{user_id}/{republic_id}', 'UserController@alugar');
Route::delete('desapropriar/{user_id}/{republic_id}', 'UserController@desapropriar');
Route::post('anunciar/{user_id}', 'UserController@anunciar');
Route::get('visualizeRepublic/{id}', 'UserController@visualizeRepublic');
Route::put('favoritar/{user_id}/{republic_id}', 'UserController@favoritar');
Route::delete('desfavoritar/{user_id}/{republic_id}', 'UserController@desfavoritar');

Route::post('comentar/{user_id}/{republic_id}', 'UserController@comentar');


Route::post('createComment', 'CommentController@createComment');
Route::get('showComment/{id}', 'CommentController@showComment');
Route::get('listComment', 'CommentController@listComment');
Route::put('updateComment/{id}', 'CommentController@updateComment');
Route::delete('deleteComment/{id}', 'CommentController@deleteComment');


//Passport Routes
Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');
Route::group(['middleware' => 'auth:api'], function() {  
  Route::delete('deleteRepublic/{id}', 'RepublicController@deleteRepublic')->middleware('deleteRepublic');
  Route::post('logout', 'API\PassportController@logout');
  Route::post('getDetails', 'API\PassportController@getDetails');
});