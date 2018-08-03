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

Route::prefix('accounts')->group(function () {
    Route::get('/', 'AccountController@all');
    Route::post('/', 'AccountController@create');
    Route::get('/{id}', 'AccountController@get');
    Route::put('/{id}', 'AccountController@update');
    Route::delete('/{id}', 'AccountController@delete');
});
Route::prefix('transactions')->group(function () {
    Route::get('/', 'TransactionController@all');
    Route::post('/', 'TransactionController@create');
    Route::get('/{id}', 'TransactionController@get');
    Route::put('/{id}', 'TransactionController@update');
    Route::delete('/{id}', 'TransactionController@delete');
});
