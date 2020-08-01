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

Route::get('/', [
    'uses' => 'CustomerController@index',
    'as' => 'dashboard'
]);


Route::get('/login', [
    'uses' => 'CustomerController@login',
    'as' => 'login'
]);

Route::get('/logout', [
    'uses' => 'CustomerController@logout',
    'as' => 'logout'
]);


Route::get('/register', [
    'uses' => 'CustomerController@new',
    'as' => 'register'
]);



Route::get('/passwordrecovery', [
    'uses' => 'CustomerController@recovery',
    'as' => 'passwordrecovery'
]);


Route::post('/register', [
    'uses' => 'CustomerController@create',
    'as' => 'saveCustomer'
]);


Route::post('/auth', [
    'uses' => 'CustomerController@authentification',
    'as' => 'auth'
]);