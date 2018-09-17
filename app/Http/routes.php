<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/skills/{user}', 'SkillController@indexAction');
Route::post('/skill/{user}', 'SkillController@storeAction');
Route::post('/skilldelete/{skill}', 'SkillController@destroyAction');
Route::get('/skilledit/{skill}', 'SkillController@editAction');
Route::post('/skillupdate/{skill}', 'SkillController@updateAction');

Route::get('/users', 'UserController@indexAction');

Route::get('/charts/{user}', 'ChartingController@indexAction');
