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

Route::group(['prefix' => 'admin'], function ()
{
    Route::group(['before' => 'admin.auth'], function ()
    {
        // app
        $options = ['except' => ['show']];
        
        Route::resource('media', 'MediaController', $options);
    });
});

//Blade::setContentTags('<%', '%>'); 		// for variables and all things Blade
//Blade::setEscapedContentTags('<%%', '%%>'); 	// for escaped data