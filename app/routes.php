<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


// candidates/bacend-developers/1
Route::get('candidates/{slug}/{id}', ['as' => 'category', 'uses' => 'CandidatesController@category']);

// blasfernandez/1
Route::get('{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);


Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);

Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);


// Formularios
Route::get('account', ['as' => 'account', 'uses' => 'UsersController@account']);
Route::put('account', ['as' => 'update_account', 'uses' => 'UsersController@updateAccount']);
Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
Route::put('profile', ['as' => 'update_profile', 'uses' => 'UsersController@updateProfile']);