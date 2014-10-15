<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Sign up/Sign in
|--------------------------------------------------------------------------
*/
Route::get('/', 'HomeController@showSignup');
Route::get('sign-in', 'HomeController@showSignIn');
Route::post('sign-in', 'HomeController@signIn');
Route::get('sign-out', 'HomeController@signOut');
Route::post('sign-up', 'HomeController@signUp');
Route::get('recover-password', 'HomeController@recoverPassword');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('dashboard', array('before' => 'auth', 'uses' => 'DashboardController@index', function(){}));
Route::get('profile', array('before' => 'auth', 'uses' => 'DashboardController@profile', function(){}));

/*
|--------------------------------------------------------------------------
| Collections
|--------------------------------------------------------------------------
*/
Route::get('collections', array('before' => 'auth', 'uses' => 'CollectionsController@index', function(){}));
Route::get('collections/add', array('before' => 'auth', 'uses' => 'CollectionsController@addCollection', function(){}));
Route::get('collections/edit/{id}',array('before' => 'auth', 'uses' => 'CollectionsController@editCollection'))->where(array('id' => '[0-9]+'));
Route::post('collections/edit/{id}',array('before' => 'auth', 'uses' => 'CollectionsController@updateCollection'))->where(array('id' => '[0-9]+'));
Route::post('collections/add', array('before' => 'auth', 'uses' => 'CollectionsController@createCollection', function(){}));
Route::post('collections/delete', array('before' => 'auth', 'uses' => 'CollectionsController@deleteCollection', function(){}));
Route::post('collections/image/update', array('before' => 'auth', 'uses' => 'CollectionsController@updateCollectionImageOrder', function(){}));
/*
/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/
Route::get('pages', array('before' => 'auth', 'uses' => 'PagesController@index', function(){}));
Route::get('pages/add', array('before' => 'auth', 'uses' => 'PagesController@addPage', function(){}));
Route::get('pages/edit/{id}',array('before' => 'auth', 'uses' => 'PagesController@editPage'))->where(array('id' => '[0-9]+'));
Route::post('pages/edit/{id}',array('before' => 'auth', 'uses' => 'PagesController@updatePage'))->where(array('id' => '[0-9]+'));
Route::post('pages/add', array('before' => 'auth', 'uses' => 'PagesController@createPage', function(){}));
Route::post('pages/delete', array('before' => 'auth', 'uses' => 'PagesController@deletePage', function(){}));

Route::post('api/pages', array('uses' => 'ApiController@getSiteNavigation', function(){}));
Route::post('api/pages/{id}',array('uses' => 'ApiController@getPageDetails'))->where(array('id' => '[0-9]+'));
Route::post('api/site', array('uses' => 'ApiController@getSiteDetails', function(){}));
Route::post('api/collections', array('uses' => 'ApiController@getCollections', function(){}));

/*
/*
|--------------------------------------------------------------------------
| Sites
|--------------------------------------------------------------------------
*/
Route::get('sites', array('before' => 'auth', 'uses' => 'SitesController@index', function(){}));
/*
|--------------------------------------------------------------------------
| Media
|--------------------------------------------------------------------------
*/
Route::get('media', 'MediaController@index');
Route::post('media/upload', 'MediaController@upload');