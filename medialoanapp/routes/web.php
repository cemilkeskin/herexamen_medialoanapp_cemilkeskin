<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function(){
    Route::get('', [
        'uses' => 'UserController@showUsers',
        'as' => 'users'
    ]);

    Route::get('navigateUser', [
        'uses' => 'UserController@navigateUser',
        'as' => 'navigateUser'
    ]);

    Route::post('createUser', [
        'uses' => 'UserController@createUser',
        'as' => 'createUser'
    ]);

    Route::get('navigateEdit/{id}', [
        'uses' => 'UserController@navigateEdit',
        'as' => 'navigateEdit'
    ]);

    Route::post('editUser/{id}', [
        'uses' => 'UserController@editUser',
        'as' => 'editUser'
    ]);

    Route::get('deleteUser/{id}', [
        'uses' => 'UserController@deleteUser',
        'as' => 'deleteUser'
    ]);
});

//Route::get('/admin', 'UserController@index')
//    ->middleware('is_admin')
//    ->name('admin');
