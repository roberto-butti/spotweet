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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/', 'MainController@index');
Route::get('/api/lang', array('as'=> 'api_tweet_count_lang', 'uses' => 'ApiController@lang'));
Route::get('/api/users', array('as'=> 'api_tweet_count_users', 'uses' => 'ApiController@users'));
Route::get('/api/hashtags', array('as'=> 'api_tweet_count_hashtags', 'uses' => 'ApiController@hashtags'));
Route::get('/api/geo', array('as'=> 'api_tweet_geo', 'uses' => 'ApiController@geo'));


//Route::resource('tweet', 'MainController');