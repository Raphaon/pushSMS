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


//Route::get('message/{apiKey}/new/{from}/{to}/{message}', function () {return request();});

// send Message through get Methode

Route::get('message/{apiKey}/new/{from}/{to}/{message}', [
    'uses' => 'ApiController@sendGetMessage',
    'as' => 'sendGetMessage'

]);



Route::post('message/new', [
    'uses' => 'ApiController@sendPostMessage',
    'as' => 'sendPostMessage'

]);






