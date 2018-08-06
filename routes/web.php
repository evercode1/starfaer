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

// Galaxy Generator

Route::get('galaxy-generator', 'GalaxyGeneratorController@create');
Route::post('galaxy-generator', 'GalaxyGeneratorController@store');

// Galaxy Type Generator

Route::get('galaxy-type-generator', 'GalaxyTypeGeneratorController@create');
Route::post('galaxy-type-generator', 'GalaxyTypeGeneratorController@store');

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

// Planet List
// id is the id of the star

Route::get('planet-list/{id}', 'PlanetListController@show');


// Planet Position Fixer

Route::post('planet-position-fixer', 'PlanetPositionFixerController@update');

// Planet Description Fixer

Route::post('planet-description-fixer', 'PlanetDescriptionFixerController@update');


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

// Star Planet Count Fixer

Route::post('fix-star-planet-count', 'FixStarPlanetCountController@update');

// Star Type Generator Routes

Route::get('star-type-generator', 'StarTypeGeneratorController@create');
Route::post('star-type-generator', 'StarTypeGeneratorController@store');

// Test Routes

Route::get('test', 'TestController@index');

// Universe Routes

Route::post('universe-delete/{universe}', 'UniverseController@destroy');

Route::get('/universe/create', 'UniverseController@create')->name('universe.create');

Route::get('universe/{universe}-{slug?}', 'UniverseController@show')->name('universe.show');

Route::resource('universe', 'UniverseController', ['except' => ['show', 'create','destroy']]);

// Universe Generator

Route::get('universe-generator', 'UniverseGeneratorController@create');
Route::post('universe-generator', 'UniverseGeneratorController@store');

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

// Zone Generator

Route::get('zone-generator', 'ZoneGeneratorController@create');
Route::post('zone-generator', 'ZoneGeneratorController@store');

// Zone Type Generator

Route::get('zone-type-generator', 'ZoneTypeGeneratorController@create');
Route::post('zone-type-generator', 'ZoneTypeGeneratorController@store');


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


// Begin Star Routes

Route::get('all-stars', 'AllStarsController@index');

Route::get('/api/all-stars-data', 'FrontApiController@allStarsData');

Route::any('api/star-data', 'ApiController@starData');

Route::post('star-delete/{id}', 'StarController@destroy');

Route::get('/star/create', 'StarController@create')->name('star.create');

Route::get('star/{star}-{slug?}', 'StarController@show')->name('star.show');

Route::resource('star', 'StarController', ['except' => ['show', 'create','destroy']]);

// End Star Routes





// Begin Star Generator Routes

Route::get('star-generator', 'StarGeneratorController@create');
Route::post('star-generator', 'StarGeneratorController@store');

// End Star Generator Routes// Begin PlanetType Generator Routes

Route::get('planet-type-generator', 'PlanetTypeGeneratorController@create');
Route::post('planet-type-generator', 'PlanetTypeGeneratorController@store');

// End PlanetType Generator Routes
// Begin PlanetType Routes

Route::get('all-planet-types', 'AllPlanetTypesController@index');

Route::get('/api/all-planet-types-data', 'FrontApiController@allPlanetTypesData');

Route::any('api/planet-type-data', 'ApiController@planetTypeData');

Route::post('planet-type-delete/{id}', 'PlanetTypeController@destroy');

Route::get('/planet-type/create', 'PlanetTypeController@create')->name('planet-type.create');

Route::get('planet-type/{id}', 'PlanetTypeController@show')->name('planet-type.show');

Route::resource('planet-type', 'PlanetTypeController', ['except' => ['show', 'create','destroy']]);

// End PlanetType Routes












// Begin Atmosphere Generator Routes

Route::get('atmosphere-generator', 'AtmosphereGeneratorController@create');
Route::post('atmosphere-generator', 'AtmosphereGeneratorController@store');

// End Atmosphere Generator Routes
// Begin Atmosphere Routes

Route::get('all-atmospheres', 'AllAtmospheresController@index');

Route::get('/api/all-atmospheres-data', 'FrontApiController@allAtmospheresData');

Route::any('api/atmosphere-data', 'ApiController@atmosphereData');

Route::post('atmosphere-delete/{id}', 'AtmosphereController@destroy');

Route::get('/atmosphere/create', 'AtmosphereController@create')->name('atmosphere.create');

Route::get('atmosphere/{atmosphere}-{slug?}', 'AtmosphereController@show')->name('atmosphere.show');

Route::resource('atmosphere', 'AtmosphereController', ['except' => ['show', 'create','destroy']]);

// End Atmosphere Routes






// Begin Planet Routes

Route::get('all-planets', 'AllPlanetsController@index');

Route::get('/api/all-planets-data', 'FrontApiController@allPlanetsData');

Route::any('api/planet-data', 'ApiController@planetData');

Route::post('planet-delete/{id}', 'PlanetController@destroy');

Route::get('/planet/create', 'PlanetController@create')->name('planet.create');

Route::get('planet/{planet}-{slug?}', 'PlanetController@show')->name('planet.show');

Route::resource('planet', 'PlanetController', ['except' => ['show', 'create','destroy']]);

// End Planet Routes





// Begin Planet Generator Routes

Route::get('planet-generator', 'PlanetGeneratorController@create');
Route::post('planet-generator', 'PlanetGeneratorController@store');

// End Planet Generator Routes
// Begin Moon Routes

Route::get('all-moons', 'AllMoonsController@index');

Route::get('/api/all-moons-data', 'FrontApiController@allMoonsData');

Route::any('api/moon-data', 'ApiController@moonData');

Route::post('moon-delete/{id}', 'MoonController@destroy');

Route::get('/moon/create', 'MoonController@create')->name('moon.create');

Route::get('moon/{moon}-{slug?}', 'MoonController@show')->name('moon.show');

Route::resource('moon', 'MoonController', ['except' => ['show', 'create','destroy']]);

// End Moon Routes





// Begin Moon Generator Routes

Route::get('moon-generator', 'MoonGeneratorController@create');
Route::post('moon-generator', 'MoonGeneratorController@store');

// End Moon Generator Routes
// Begin SurfaceType Routes

Route::get('all-surface-types', 'AllSurfaceTypesController@index');

Route::get('/api/all-surface-types-data', 'FrontApiController@allSurfaceTypesData');

Route::any('api/surface-type-data', 'ApiController@surfaceTypeData');

Route::post('surface-type-delete/{id}', 'SurfaceTypeController@destroy');

Route::get('/surface-type/create', 'SurfaceTypeController@create')->name('surface-type.create');

Route::get('surface-type/{id}', 'SurfaceTypeController@show')->name('surface-type.show');

Route::resource('surface-type', 'SurfaceTypeController', ['except' => ['show', 'create','destroy']]);

// End SurfaceType Routes





// Begin SurfaceType Generator Routes

Route::get('surface-type-generator', 'SurfaceTypeGeneratorController@create');
Route::post('surface-type-generator', 'SurfaceTypeGeneratorController@store');

// End SurfaceType Generator Routes