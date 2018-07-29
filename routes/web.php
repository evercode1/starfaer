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

// All Articles Route

Route::get('all-articles', 'AllArticlesController@index');

// All Books Route

Route::get('all-books', 'AllBooksController@index');

// All Universes Route

Route::get('all-universes', 'AllUniversesController@index');

// All Video Route

Route::get('all-videos', 'AllVideosController@index');
Route::get('all-videos/{id}-{slug?}', 'AllVideosController@show')->name('all-videos.show');


// API Routes

Route::get('api/alarm-data', 'ApiController@alarmData');
Route::get('api/alarm-data-admin', 'ApiController@alarmDataAdmin');
Route::get('/api/all-articles-data', 'ApiController@allArticlesData');
Route::get('/api/all-books-data', 'ApiController@allBooksData');
Route::get('/api/all-universes-data', 'ApiController@allUniversesData');
Route::get('api/all-video-data', 'ApiController@allVideoData');
Route::get('api/archives', 'ApiController@archives');
Route::get('api/article-list-data', 'ApiController@articleListData');
Route::get('api/book-data', 'ApiController@bookData');
Route::get('api/category-data', 'ApiController@categoryData');
Route::get('api/category-list', 'ApiController@categoryList');
Route::get('api/closed-contact-data', 'ApiController@closedContactData');
Route::get('api/contact-data', 'ApiController@ContactData');
Route::get('api/contact-topic-data', 'ApiController@ContactTopicData');
Route::get('api/content-data', 'ApiController@contentData');
Route::get('api/level-data', 'ApiController@levelData');
Route::get('api/open-contact-data', 'ApiController@openContactData');
Route::get('api/post-data', 'ApiController@postData');
Route::get('api/total-videos', 'ApiController@totalVideos');
Route::get('api/universe-data', 'ApiController@universeData');
Route::get('api/user-data', 'ApiController@userData');
Route::get('api/videos-by-category-data', 'ApiController@videosByCategoryData');
Route::get('api/videos-by-level-data', 'ApiController@videosByLevelData');
Route::get('api/videos-by-category-list-data', 'ApiController@videosByCategoryListData');
Route::get('api/videos-by-level-list-data', 'ApiController@videosByLevelListData');
Route::get('api/video-data', 'ApiController@videoData');
Route::get('api/video-chart', 'ApiController@videoChartData');
Route::get('api/video-list-data', 'ApiController@videoListData');

// Auth Routes

Auth::routes();

// Book Routes

Route::post('book-delete/{book}', 'BookController@destroy');

Route::resource('book', 'BookController', ['except' => ['destroy']]);

// Cancel Account Routes

Route::patch('/cancel', 'CancelUserController@update')->name('cancel-user-account');

// Category Routes

Route::post('category-delete/{category}', 'CategoryController@destroy');

Route::resource('category', 'CategoryController', ['except' => ['destroy']]);

// Content Routes

Route::post('content-delete/{content}', 'ContentController@destroy');

Route::resource('/content', 'ContentController', ['except' => ['destroy']]);

// Contact Routes

Route::post('/contact-delete', 'ContactController@destroy')->name('contact.destroy');

Route::resource('/contact', 'ContactController', ['except' => ['destroy']]);

Route::get('/open-contacts', 'OpenContactController@index')->name('contact.open');

Route::get('/closed-contacts', 'ClosedContactController@index');

Route::post('/contact-topic-delete/{id}', 'ContactTopicController@destroy')->name('contact-topic.destroy');

Route::resource('/contact-topic', 'ContactTopicController', ['except' => ['destroy']]);

// Home Routes

Route::get('/home', 'HomeController@index')->name('home');

// Level Routes

Route::post('level-delete/{level}', 'LevelController@destroy');

Route::resource('level', 'LevelController', ['except' => ['destroy']]);

// Messages route

Route::get('support-messages', 'MessagesController@index');

Route::get('support-messages-show/{message}', 'MessagesController@show');

// Pages Routes

Route::get('/', 'PagesController@index')->name('welcome');

Route::get('/about', 'PagesController@about')->name('pages.about');

Route::get('/cancel-account-confirmation', 'PagesController@cancelAccountConfirmation')->name('cancel.cancel-account-confirmation');

Route::get('/privacy-policy', 'PagesController@privacy')->name('pages.privacy');

Route::get('/terms-of-service', 'PagesController@terms')->name('pages.terms');

// Password Reset Request

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

// Post Routes

Route::get('post-by-category/{id}', 'PostsByCategoryController@index')->name('post.by-category');

Route::get('post-by-date/{date}', 'PostsByDateController@index')->name('post.by-date');

Route::post('post-delete/{post}', 'PostController@destroy')->name('post.destroy');

Route::get('post/create',  'PostController@create')->name('post.create');

Route::get('post/{post}-{slug?}', 'PostController@show')->name('post.show');

Route::resource('post', 'PostController', ['except' => ['show', 'create', 'destroy']]);

// Reply Routes

Route::resource('reply', 'ReplyController');

// Seed Group Routes

Route::get('seed-group', 'SeedGroupController@create');
route::post('seed-group', 'SeedGroupController@store');

// Seeder Routes

Route::get('seeder', 'SeederController@create');
route::post('seeder', 'SeederController@store');

// Settings routes

Route::get('settings', 'SettingsController@edit');

Route::patch('settings', 'SettingsController@update')->name('user-update');


// Socialite routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Star Seed Routes

Route::get('star-type-seeder', 'StarTypeSeederController@create');
Route::post('star-type-seeder', 'StarTypeSeederController@store');

// Test Routes

Route::get('test', 'TestController@index');

// Universe Routes

Route::post('universe-delete/{universe}', 'UniverseController@destroy');

Route::get('/universe/create', 'UniverseController@create')->name('universe.create');

Route::get('universe/{universe}-{slug?}', 'UniverseController@show')->name('universe.show');

Route::resource('universe', 'UniverseController', ['except' => ['show', 'create','destroy']]);

// Unsubscribe Routes

Route::get('/unsubscribe', 'UnsubscribeController@edit')->name('unsubscribe');
Route::post('/unsubscribe', 'UnsubscribeController@store')->name('unsubscribe-store');
Route::get('/unsubscribe/confirmation', 'UnsubscribeController@confirm')->name('unsubscribe-confirmation');


// User routes

Route::resource('user', 'UserController');

// Video Routes

Route::get('videos-by-category/{id}', 'VideosByCategoryController@index');

Route::get('videos-by-level/{id}', 'VideosByLevelController@index');

Route::post('video-delete/{video}', 'VideoController@destroy');

Route::resource('/video', 'VideoController', ['except' => ['destroy']]);


// Begin Galaxy Routes

Route::get('all-galaxies', 'AllGalaxiesController@index');

Route::get('/api/all-galaxies-data', 'FrontApiController@allGalaxiesData');

Route::any('api/galaxy-data', 'ApiController@galaxyData');

Route::post('galaxy-delete/{galaxy}', 'GalaxyController@destroy');

Route::get('/galaxy/create', 'GalaxyController@create')->name('galaxy.create');

Route::get('galaxy/{galaxy}-{slug?}', 'GalaxyController@show')->name('galaxy.show');

Route::resource('galaxy', 'GalaxyController', ['except' => ['show', 'create','destroy']]);

// End Galaxy Routes

// Begin GalaxyType Routes

Route::get('all-galaxy-types', 'AllGalaxyTypesController@index');

Route::get('/api/all-galaxy-types-data', 'FrontApiController@allGalaxyTypesData');

Route::any('api/galaxy-type-data', 'ApiController@galaxyTypeData');

Route::post('galaxy-type-delete/{id}', 'GalaxyTypeController@destroy');

Route::get('/galaxy-type/create', 'GalaxyTypeController@create')->name('galaxy-type.create');

Route::get('galaxy-type/{id}', 'GalaxyTypeController@show')->name('galaxy-type.show');

Route::resource('galaxy-type', 'GalaxyTypeController', ['except' => ['show', 'create','destroy']]);

// End GalaxyType Routes

// Begin ZoneType Routes

Route::any('api/zone-type-data', 'ApiController@ZoneTypeData');

Route::post('zone-type-delete/{id}', 'ZoneTypeController@destroy');

Route::get('/zone-type/create', 'ZoneTypeController@create')->name('zone-type.create');

Route::get('zone-type/{id}', 'ZoneTypeController@show')->name('zone-type.show');

Route::resource('zone-type', 'ZoneTypeController', ['except' => ['show', 'create','destroy']]);

// End ZoneType Routes


// Begin Zone Routes

Route::get('all-zones', 'AllZonesController@index');

Route::get('/api/all-zones-data', 'FrontApiController@allZonesData');

Route::any('api/zone-data', 'ApiController@zoneData');

Route::post('zone-delete/{id}', 'ZoneController@destroy');

Route::get('/zone/create', 'ZoneController@create')->name('zone.create');

Route::get('zone/{zone}-{slug?}', 'ZoneController@show')->name('zone.show');

Route::resource('zone', 'ZoneController', ['except' => ['show', 'create','destroy']]);

// End Zone Routes



// Begin StarType Routes

Route::get('all-star-types', 'AllStarTypesController@index');

Route::get('/api/all-star-types-data', 'FrontApiController@allStarTypesData');

Route::any('api/star-type-data', 'ApiController@starTypeData');

Route::post('star-type-delete/{id}', 'StarTypeController@destroy');

Route::get('/star-type/create', 'StarTypeController@create')->name('star-type.create');

Route::get('star-type/{id}', 'StarTypeController@show')->name('star-type.show');

Route::resource('star-type', 'StarTypeController', ['except' => ['show', 'create','destroy']]);

// End StarType Routes





