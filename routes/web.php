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
    'uses' => 'HomeController@index',
    'as' => 'home'
]);



Route::get('/dashboard', [
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


Route::post('/sendMessage', [
    'uses' => 'HomeController@sendUsMessage',
    'as' => 'customerMessage'
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


Route::get('/repertoires', [
    'uses' => 'RepertoireController@index',
    'as' => 'repertoires'
]);



Route::get('/repertoire/new', [
    'uses' => 'RepertoireController@new',
    'as' => 'newRepertoire'
]);

Route::post('/saveRepertoire', [
    'uses' => 'RepertoireController@store',
    'as' => 'saveRepertoire'
]);


Route::get('Campagne/new', [
    'uses' => 'CampagneController@create',
    'as' => 'newCampagne'
]);


Route::post('Campagne/send', [
    'uses' => 'CampagneController@store',
    'as' => 'saveCampagne'
]);


Route::get('/repertoire/{id}/contacts', [
    'uses' => 'RepertoireController@showContact',
    'as' => 'showRepertoireContact'
]);




Route::get('/contact/import', [
    'uses' => 'ContactController@import',
    'as' => 'importContact'
]);


Route::post('/saveContact', [
    'uses' => 'ContactController@importTraitment',
    'as' => 'importContactTraitment'
]);



Route::get('/project/new', [
    'uses' => 'ProjectController@new',
    'as' => 'newProject'

]);



Route::post('/project/save', [
    'uses' => 'ProjectController@store',
    'as' => 'saveProject'
    
]);




Route::get('/appointment', [
    'uses' => 'RDVController@create',
    'as' => 'newRDV'
    
]);