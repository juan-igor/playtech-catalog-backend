<?php

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

// Routes without authentication
Route::get('products/list', 'ProductController@list')->name('api.product.list');
Route::get('products/{id}', 'ProductController@show')->name('api.product.view');

// Routes with authentication
Route::middleware('auth:api')->group(function() {
    Route::apiResource('products', 'ProductController');
});

// Routes without authentication
Route::get('products', 'ProductController@index');

// Storage routes
Route::prefix('storage')->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::post('upload', 'StorageController@upload')->name('storage.upload');
        Route::post('update/{hash}', 'StorageController@update')->name('storage.update');
        Route::delete('delete/{hash}', 'StorageController@delete')->name('storage.delete');
    });

    // Routes to view storage file
    Route::get('view/{hash}', 'StorageController@view')->name('storage.view');
    Route::get('download/{hash}', 'StorageController@download')->name('storage.download');
});
