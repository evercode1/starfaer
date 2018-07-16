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

// Content Routes

Route::post('content-delete/{content}', 'ContentController@destroy');

Route::resource('/content', 'ContentController', ['except' => ['destroy']]);

// Home Routes

Route::get('/home', 'HomeController@index')->name('home');

// Pages Routes

Route::get('/', 'PagesController@index')->name('welcome');

Route::get('/about', 'PagesController@about')->name('pages.about');

Route::get('/privacy-policy', 'PagesController@privacy')->name('pages.privacy');

Route::get('/terms-of-service', 'PagesController@terms')->name('pages.terms');


// Socialite routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// User routes

Route::resource('user', 'UserController');
