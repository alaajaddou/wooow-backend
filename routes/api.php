<?php

use App\Http\Controllers\Api\ApiController;
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
// middleware('auth:api')->

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@create');
Route::group([
    'middleware' => ['api'],
], function ($router) {
    // Route::post('check-auth', 'Auth\LoginController@checkAuth' );
    // catalog api requests
    Route::get('get-all-data', 'Api\ApiController@getAllData');
    Route::get('categories', 'CatalogController@getCategories');
    Route::get('category/{category?}', 'CatalogController@getCategory');
    Route::get('items/{category?}/{offset?}', 'CatalogController@loadItems');
    Route::group(['middleware' => 'auth:api'], function($route) {
      Route::post('order', 'OrderController@store');
      Route::get('orders', 'OrderController@getOrdersByUser');

      Route::get('OrderStatuses', 'OrderController@getOrderStatuses');
      Route::put('cancel-order', 'OrderController@cancelOrder');
      Route::post('create-address', 'UserController@createAddress');
    });

});
/**
    Route::post('login', 'AuthController@login');
Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
// users api requests
Route::group([
    'middleware' => 'cors:api'
], function () {
    Route::get('category/{category?}', 'CatalogController@getCategories');
    Route::get('items/{category?}', ['middleware' => 'cors', 'CatalogController@loadItems']);
// add any routes
});

// users
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@find');

    // catalog api requests
    Route::middleware('cors:api')->get('categories', 'CatalogController@getCategories');
    Route::get('category/{category?}', 'CatalogController@getCategory');
    Route::middleware('cors:api')->get('items/{category?}', 'CatalogController@loadItems');

    Route::resource('order', 'OrderController');


    // Cart api requests
    Route::get('cart/items', 'CartController@loadItems');
    Route::post('cart/add', 'CartController@addToCart');
    Route::post('cart/remove/{id}', 'CartController@removeFromCart');

    Route::resource('order', 'OrderController');

**/
