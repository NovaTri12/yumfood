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


Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'API\UserController@getUser');
    });

    Route::group(['prefix' => 'v1'], function () {
        // Read Section
        Route::get('vendors', 'API\VendorController@readVendors');
        Route::get('vendors/{vendorId}', 'API\VendorController@readVendorByID');
        Route::get('/vendors/{tagName}', 'API\VendorController@getVendorsByTag');
        Route::get('tags', 'API\TagController@readTags');
        Route::get('tags/{tagId}', 'API\TagController@readTagByID');
        Route::get('dishes/{dishId}', 'API\DishController@readDishByID');

        // Create Section
        Route::post('vendors/create', 'API\VendorController@createVendor');
        Route::post('tags/create', 'API\TagController@createTag');
        Route::post('orders/create', 'API\OrderController@createOrder');

        // Update Section
        Route::post('tags/{tagId}/update', 'API\TagController@updateTag');
        Route::post('dishes/{dishId}/update', 'API\DishController@updateDish');
        Route::post('vendors/{vendorId}/update', 'API\VendorController@updateVendor');
        Route::post('orders/{orderId}/update', 'API\OrderController@updateOrder');


        // Delete Section
        
        Route::post('vendors/{vendorId}/delete', 'API\VendorController@deleteVendor');
        Route::post('tags/{tagId}/delete', 'API\TagController@deleteTag');
        Route::post('dishes/{dishId}/delete', 'API\DishController@deleteDish');
        Route::post('orders/{orderId}/delete', 'API\OrderController@deleteOrder');


    });
});

Route::post('login', 'API\UserController@login');