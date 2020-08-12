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

Route::group(['prefix' => 'items'], function(){
    Route::get('', [
        'uses' => 'ItemController@showItems',
        'as' => 'items'
    ]);

    Route::get('navigateCreate', [
        'uses' => 'ItemController@navigateCreate',
        'as' => 'navigateCreate'
    ]);

    Route::post('createItem', [
        'uses' => 'ItemController@createItem',
        'as' => 'createItem'
    ]);

    Route::get('deleteItem/{id}', [
        'uses' => 'ItemController@deleteItem',
        'as' => 'deleteItem'
    ]);

    Route::get('navigateEditItem/{id}', [
        'uses' => 'ItemController@navigateEditItem',
        'as' => 'navigateEditItem'
    ]);

    Route::post('editItem/{id}', [
        'uses' => 'ItemController@editItem',
        'as' => 'editItem'
    ]);

    Route::get('navigateItem/{id}', [
        'uses' => 'ItemController@navigateItem',
        'as' => 'navigateItem'
    ]);
});

Route::group(['prefix' => 'loans'], function(){
    Route::get('myLoans/{id}', [
        'uses' => 'LoanController@showLoans',
        'as' => 'loans'
    ]);

    Route::post('createLoan/{id}{id2}', [
        'uses' => 'LoanController@createLoan',
        'as' => 'createLoan'
    ]);

    Route::get('navigateEditLoan/{id}', [
        'uses' => 'LoanController@navigateEditLoan',
        'as' => 'navigateEditLoan'
    ]);

    Route::get('allLoans', [
        'uses' => 'LoanController@allLoans',
        'as' => 'allLoans'
    ]);

    Route::get('deleteLoan/{id}', [
        'uses' => 'LoanController@deleteLoan',
        'as' => 'deleteLoan'
    ]);

});

//Route::get('/admin', 'UserController@index')
//    ->middleware('is_admin')
//    ->name('admin');
