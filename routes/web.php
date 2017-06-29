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

Route::get('/', function () {
    Theme::init('freelancer');
    return View::make('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', function() {
        return redirect(route('admin.page_overview'));
    })->name('page_home');
    // Login page
    Route::get('login', ['as' => 'page_login', 'uses' => 'AuthController@login']);
    // Login action
    Route::post('login', ['as' => 'action_login', 'uses' => 'AuthController@loginHandle']);

    // Logged users
    Route::group(['middleware' => 'auth'], function () {
        // Logout action
        Route::post('logout', ['as' => 'page_logout', 'uses' => 'AuthController@doLogout']);
        // Overview index page
        Route::get('overview', ['as' => 'page_overview', 'uses' => 'OverviewController@index']);
    });
});