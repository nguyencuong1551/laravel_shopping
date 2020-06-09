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
Route::get('/', 'Customer\HomeController@index')->name('welcome');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'checkAdmin'], function () {
    Route::get('home', 'AdminController@index')->name('home');

    Route::post('home/product/search', 'ProductController@search')->name('product.search');
    Route::get('home/product', 'ProductController@index')->name('product.index');
    Route::get('home/product/create', 'ProductController@create')->name('product.create');
    Route::post('home/product', 'ProductController@store')->name('product.store');
    Route::get('home/product/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('home/product/{id}', 'ProductController@update')->name('product.update');
    Route::get('home/product/{id}', 'ProductController@destroy')->name('product.destroy');

    Route::get('home/category', 'CategoryController@index')->name('category.index');
    Route::get('home/category/create', 'CategoryController@create')->name('category.create');
    Route::post('home/category', 'CategoryController@store')->name('category.store');
    Route::get('home/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('home/category/{id}', 'CategoryController@update')->name('category.update');
    Route::get('home/category/{id}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('home/event', 'EventController@index')->name('event.index');
    Route::get('home/event/create', 'EventController@create')->name('event.create');
    Route::post('home/event', 'EventController@store')->name('event.store');
    Route::get('home/event/{id}/edit', 'EventController@edit')->name('event.edit');
    Route::post('home/event/{id}', 'EventController@update')->name('event.update');
    Route::get('home/event/{id}', 'EventController@destroy')->name('event.destroy');

    Route::get('home/user', 'UserController@index')->name('user.index');

    Route::get('home/comment', 'CommentController@index')->name('comment.index');

    Route::get('home/bill', 'BillController@index')->name('bill.index');
    Route::get('home/bill_detail/{id}/{idUser}', 'BillController@detail')->name('bill.detail');

});

Route::group(['prefix' => 'customer', 'namespace' => 'Customer'], function () {
    Route::get('login', 'UserController@login')->name('customer.user.login');
    Route::get('logout', 'UserController@logout')->name('customer.user.logout');
    Route::post('login/check', 'UserController@checkUser')->name('customer.user.checkUser');
    Route::get('register/create', 'UserController@create')->name('customer.user.create');
    Route::post('register', 'UserController@store')->name('customer.user.store');
    Route::get('master', 'HomeController@master')->name('customer.user.master');

    Route::get('category/{id}', 'CategoryController@index')->name('customer.category.index');

    Route::get('product/{id}', 'ProductController@index')->name('customer.product.index');
    Route::get('product/search', 'ProductController@search')->name('customer.product.search');

    Route::post('product/{id}/comment', 'CommentController@store')->name('customer.comment.store');
    Route::get('product/{id}/comment/{idComment}', 'CommentController@destroy')->name('customer.comment.destroy');

    Route::get('event/{id}', 'EventController@index')->name('customer.event.index');

    Route::get('pay', 'BillController@index')->name('customer.bill.index')->middleware('checkUser');
    Route::post('pay/store', 'BillController@store')->name('customer.bill.store');


    Route::get('cart/create/{id}', 'CartController@create')->name('customer.cart.create');
    Route::get('cart/index', 'CartController@index')->name('customer.cart.index');
    Route::get('cart/delete/{key}', 'CartController@destroy')->name('customer.cart.destroy');
    Route::post('cart/update', 'CartController@update')->name('customer.cart.update');
});


