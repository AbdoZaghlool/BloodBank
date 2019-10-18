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
Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::get('governorates', 'MainController@governorates');
    Route::get('cities', 'MainController@cities');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('contacts', 'MainController@contacts');
    Route::get('settings', 'MainController@settings');
    Route::get('categories', 'MainController@categories');
    Route::get('blood-types', 'MainController@bloodTypes');
    Route::post('reset-password', 'AuthController@resetPassword');
    Route::post('new-password', 'AuthController@newPassword');



    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('notification-settings', 'MainController@notificationSettings');
        Route::post('notification-settings', 'MainController@notificationSettingsUpdate');
        Route::get('posts', 'PostController@index');
        Route::post('posts/{post}/favourite', 'postController@favouritePost');
        Route::post('posts/{post}/unfavourite', 'postController@unfavouritePost');
        Route::get('posts/favourites', 'postController@favourites');
        Route::get('posts/{post}', 'postController@show');
        Route::get('profile', 'AuthController@profile');
        Route::resource('donation', 'DonationController');
    });
});
