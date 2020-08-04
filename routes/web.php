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

Route::get('/activationAccount/{customerID}', [
    'uses' => 'CustomerController@activateAccount',
    'as' => 'activationMail'
]);


Route::get('/activateMessage', [
    'uses' => 'CustomerController@activateMessage',
    'as' => 'activationMessage'
]);





Route::post('/register', [
    'uses' => 'CustomerController@create',
    'as' => 'saveCustomer'
]);


Route::post('/auth', [
    'uses' => 'CustomerController@authentification',
    'as' => 'auth'
]);





Route::get('/newMessage', [
    'uses' => 'MessageController@new',
    'as' => 'newMessage'
]);


Route::get('/messages', [
    'uses' => 'MessageController@index',
    'as' => 'messages'
]);




Route::post('/saveMessage', [
    'uses' => 'MessageController@create',
    'as' => 'sendingMessage'
]);





Route::get('/projects', [
    'uses' => 'ProjectController@index',
    'as' => 'projects'
]);




Route::get('/resetpassword/{token}', [
    'uses' => 'CustomerController@resetPassword',
    'as' => 'resetpassword'
]);

Route::post('/changepassword', [
    'uses' => 'CustomerController@changePassword',
    'as' => 'changepassword'
]);

Route::get('/passwordrecovery', [
    'uses' => 'CustomerController@recovery',
    'as' => 'passwordrecovery'
]);

Route::post('/MailRecovery', [
    'uses' => 'CustomerController@MailRecovery',
    'as' => 'MailRecovery'
]);