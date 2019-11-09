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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('governorate', 'GovernorateController');
    Route::resource('city', 'CityController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('role', 'RoleController');
    Route::get('client', 'ClientController@index');
    Route::DELETE('client/{id}/delete', 'ClientController@destroy');
    Route::GET('client/activate', 'ClientController@activate');
    Route::GET('client/deactivate', 'ClientController@deactivate');
    Route::GET('donation', 'DonationController@index');
    Route::GET('donation/show', 'DonationController@show');
    Route::DELETE('donation/{id}/delete', 'DonationController@destroy');
    Route::GET('contact', 'ContactController@index');
    Route::DELETE('contact/{id}/delete', 'ContactController@destroy');
    Route::get('setting', 'SettingController@edit');
    Route::put('setting', 'SettingController@update');
});
Route::get('user/change-password', 'UserController@showResetForm');
Route::post('user/set-pin-code', 'UserController@changePassword');
Route::Post('user/new-password', 'UserController@updatePassword');
Route::resource('user', 'UserController');
