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

Route::group(['middleware' => ['catchExceptions', 'api']], function() {

    Route::post('register', 'UserController@register');

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

    Route::group(['middleware' => ['auth:api']], function() {
        Route::prefix('account_transfers')->group(function () {
            Route::get('/', 'AccountTransferController@all');
            Route::post('/', 'AccountTransferController@create');
            Route::get('/{id}', 'AccountTransferController@get');
            Route::put('/{id}', 'AccountTransferController@update');
            Route::delete('/{id}', 'AccountTransferController@delete');
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
        Route::prefix('expenses')->group(function () {
            Route::get('/', 'ExpenseController@all');
            Route::post('/', 'ExpenseController@create');
            Route::get('/{id}', 'ExpenseController@get');
            Route::put('/{id}', 'ExpenseController@update');
            Route::delete('/{id}', 'ExpenseController@delete');
        });
        Route::prefix('incomes')->group(function () {
            Route::get('/', 'IncomeController@all');
            Route::post('/', 'IncomeController@create');
            Route::get('/{id}', 'IncomeController@get');
            Route::put('/{id}', 'IncomeController@update');
            Route::delete('/{id}', 'IncomeController@delete');
        });
        Route::prefix('business')->group(function () {
            Route::prefix('/clients')->group(function () {
              Route::get('/', 'ClientController@all');
              Route::post('/', 'ClientController@create');
              Route::get('/{id}', 'ClientController@get');
              Route::put('/{id}', 'ClientController@update');
              Route::delete('/{id}', 'ClientController@delete');
            });
            Route::prefix('/projects')->group(function () {
              Route::get('/', 'ProjectController@all');
              Route::post('/', 'ProjectController@create');
              Route::get('/{id}', 'ProjectController@get');
              Route::put('/{id}', 'ProjectController@update');
              Route::delete('/{id}', 'ProjectController@delete');
            });
            Route::prefix('/work')->group(function () {
              Route::get('/', 'WorkController@all');
              Route::post('/', 'WorkController@create');
              Route::get('/{id}', 'WorkController@get');
              Route::put('/{id}', 'WorkController@update');
              Route::delete('/{id}', 'WorkController@delete');
            });
            Route::prefix('/payments')->group(function () {
              Route::get('/', 'PaymentController@all');
              Route::post('/', 'PaymentController@create');
              Route::get('/{id}', 'PaymentController@get');
              Route::put('/{id}', 'PaymentController@update');
              Route::delete('/{id}', 'PaymentController@delete');
            });
            Route::prefix('/payment_types')->group(function () {
              Route::get('/', 'PaymentTypeController@all');
              Route::post('/', 'PaymentTypeController@create');
              Route::get('/{id}', 'PaymentTypeController@get');
              Route::put('/{id}', 'PaymentTypeController@update');
              Route::delete('/{id}', 'PaymentTypeController@delete');
            });
        });
    });        
});
