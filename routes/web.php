<?php

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
// Route::group(['middleware' => 'web'], function() {
// 	Route::resource('user', 'UserController')->middleware('admin.user');
// });
// Route::get('login-user', 'Auth\LoginController@loginPage')->name('login');
// Route::post('login-user', 'Auth\LoginController@login')->name('post-login-user');
// Route::get('register', 'Auth\RegisterController@index')->name('register-user');
// Route::post('register', 'Auth\RegisterController@create')->name('create-user');
// Route::get('reset', 'Auth\ForgotPasswordController@index');
// Route::get('resetPassword', 'Auth\ForgotPasswordController@index')->name('password.update');
// Route::get('logout-user', 'UserController@logout');

// Route::get('',function() {
//     return redirect()->route('admin');
// });

// Route::resource('categories', 'Manager\CategoriesController');

// Route::get('items', 'Manager\ItemsController@index');

// Route::get('customers', 'Manager\CustomersController@index');

// Route::get('orders', 'Manager\OrdersController@index');
Route::group(['prefix' => 'admin'], function() {
	Voyager::routes();
	Route::post('items/import', 'Manager\ItemsController@upload');
});

//Route::post('logout', [
//    'as' => 'logout',
//    'uses' => 'UserController@logout'
//]);
Auth::routes();
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('/', function() {
    return view('welcome');
});
Route::get('/home', 'CatalogController@index')->name('home');
Route::get('cart', 'OrderController@cart')->name('cart');
Route::post('addToCart', 'OrderController@addToCart')->name('add-to-cart');
Route::post('removeFromCart', 'OrderController@removeFromCart')->name('removeFromCart');
Route::get('emptyCart', 'OrderController@emptyCart')->name('emptyCart');
Route::get('get-total', 'OrderController@getTotal')->name('get-cart-total');
Route::get('get-total-quantity', 'OrderController@getTotalQuantity')->name('get-cart-total-quantity');
Route::get('checkout', 'OrderController@checkout')->name('checkout');
Route::get('order-list', 'OrderController@index')->name('order-list');
Route::get('wishlist', 'WishListController@index')->name('wishlist');
Route::post('toggle-wishlist', 'WishListController@toggle')->name('toggle-wishlist');
//Route::put('remove-from-wishlist/{id}', 'WishListController@delete')->name('remove-from-wishlist');
Route::post('empty-wishlist', 'WishListController@emptyWishlist')->name('empty-wishlist');
Route::get('order/{id}', 'OrderController@show')->name('order');
Route::get('home-categories', 'CatalogController@getCategory')->name('home-categories');
Route::get('small-categories', 'CatalogController@smallCategories')->name('small-categories');
Route::get('categories', 'CatalogController@getCategories')->name('category-list');
Route::get('list/{id}', 'CatalogController@loadItems');
Route::get('search', 'CatalogController@search')->name('search');
Route::post('autocomplete', 'CatalogController@searchResult')->name('autocomplete');
Route::get('item/{id}', 'CatalogController@show');
Route::get('user/address', 'UserController@getAddress')->name('address');
Route::resource('user', 'UserController');
Route::get('notifications', 'UserController@notifications')->name('notifications');
Route::put('read-notifications', 'UserController@readNotifications')->name('read-notifications');
Route::post('order', 'OrderController@store')->name('create-order');
Route::get('orders', 'OrderController@getOrdersByUser');
Route::get('OrderStatuses', 'OrderController@getOrderStatuses');
Route::put('cancel-order', 'OrderController@cancelOrder')->name('cancel-order');
Route::post('create-address', 'UserController@createAddress')->name('create-address');
Route::get('page/{slug}', 'PagesController@show')->name('page');
