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

//List users
Route::get('users', 'UserController@indexAction')->name('users.index');

//create User
Route::get('users/new', 'UserController@newAction')->name('users.new');
Route::post('users/create', 'UserController@createAction')->name('users.create');
//Route::get('users/create', 'UserController@indexAction');

//Edit User
Route::get('users/{user}/edit', 'UserController@editAction')->name('users.edit');
Route::post('users/{user}/update', 'UserController@updateAction')->name('users.update');

Route::get('/skills/{user}', 'SkillController@indexAction');
Route::post('/skill/{user}', 'SkillController@storeAction');
Route::post('/skilldelete/{skill}', 'SkillController@destroyAction');
Route::get('/skilledit/{skill}', 'SkillController@editAction');
Route::post('/skillupdate/{skill}', 'SkillController@updateAction');



Route::get('/charts/{user}', 'ChartingController@indexAction');


Route::get('/skillset', 'SkillsetController@indexAction');
Route::post('/searchskillset', 'SkillsetController@searchAction');
Route::get('/searchskillset', 'SkillsetController@indexAction');