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


//  Admin Routes

Route::get('/admin', 'AdminController@index')->name('admin');


// API Routes

Route::get('api/content-data', 'ApiController@contentData');
Route::get('api/user-data', 'ApiController@userData');

// Auth Routes

Auth::routes();

// Cancel Account Routes

Route::patch('/cancel', 'CancelUserController@update')->name('cancel-user-account');

// Content Routes

Route::post('content-delete/{content}', 'ContentController@destroy');

Route::resource('/content', 'ContentController', ['except' => ['destroy']]);

// Home Routes

Route::get('/home', 'HomeController@index')->name('home');

// Pages Routes

Route::get('/', 'PagesController@index')->name('welcome');

Route::get('/about', 'PagesController@about')->name('pages.about');

Route::get('/cancel-account-confirmation', 'PagesController@cancelAccountConfirmation')->name('cancel.cancel-account-confirmation');

Route::get('/privacy-policy', 'PagesController@privacy')->name('pages.privacy');

Route::get('/terms-of-service', 'PagesController@terms')->name('pages.terms');

// Password Reset Request

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

// Settings routes

Route::get('settings', 'SettingsController@edit');

Route::patch('settings', 'SettingsController@update')->name('user-update');


// Socialite routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Unsubscribe Routes

Route::get('/unsubscribe', 'UnsubscribeController@edit')->name('unsubscribe');
Route::post('/unsubscribe', 'UnsubscribeController@store')->name('unsubscribe-store');
Route::get('/unsubscribe/confirmation', 'UnsubscribeController@confirm')->name('unsubscribe-confirmation');


// User routes

Route::resource('user', 'UserController');
