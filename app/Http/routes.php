<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {


    Route::get('/', ['as' => 'home', function() {
        return view('pages.index');
    }]);

    Route::auth();

    Route::group(['prefix' => 'draft', 'as' => 'draft'], function() {
        Route::get('/', function() {
            return view('drafts.index');
        });

        Route::get('{name}', function($name) {
            return view('drafts.' . $name);
        })->where('name', '[a-zA-Z0-9]+');
    });

    Route::group(['prefix' => 'video', 'as' => 'video::'], function() {
        Route::get('/add', ['as' => 'add', 'uses' => 'VideoController@getAdd']);
        Route::post('/add', ['as' => 'add', 'uses' => 'VideoController@postAdd']);

        Route::get('/watch/{video_tag}', ['as' => 'watch', 'uses' => 'VideoController@getWatch'])
            ->where('video_tag', '\w+');
    });

});

