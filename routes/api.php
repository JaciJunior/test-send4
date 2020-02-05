<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, Application, api_key');

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
Route::group(['middleware' => ['cors']], function () {
    Route::prefix('v1')->namespace('Api')->group(function () {
        //public routes
        Route::post('requestToken', 'Auth\\LoginJwtController@login')->name('requestToken');
        Route::post('registerUser', 'Auth\\LoginJwtController@registrar')->name('registerUser');

        //middleware jwt
        Route::group(['middleware' => ['jwt.auth']], function () {
                Route::prefix('users')->group(function () {
                    Route::get('list', 'Users\\UserController@index')->name('list');
                    Route::post('list/{id}', 'Users\\UserController@show')->name('listuser');
                    Route::delete('delete/{id}', 'Users\\UserController@destroy')->name('delete');
                    Route::put('update/{id}', 'Users\\UserController@update')->name('update');
            });


        });

    });
});






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});