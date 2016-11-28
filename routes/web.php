<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/dashboard/logout', 'Auth\\LoginController@logout');

    /* Preference Module */
    Route::get('/preference/site', 'Admin\\PreferenceController@index');
    Route::post('/preference/site', 'Admin\\PreferenceController@update');

    /* Role - Access Control Module */
    Route::get('/access/role', 'Admin\\RoleController@index');

    //Route::get('/access/role/create', 'Admin\\RoleController@create');
    Route::post('/access/role', 'Admin\\RoleController@store');

    Route::get('/access/role/edit/{id}', 'Admin\\RoleController@edit');
    Route::post('/access/role/update/{id}', 'Admin\\RoleController@update');

    Route::get('/access/role/remove/{id}', 'Admin\\RoleController@remove');
    Route::get('/access/role/trash', 'Admin\\RoleController@trash');
    Route::get('/access/role/restore/{id}', 'Admin\\RoleController@restore');
    Route::get('/access/role/delete/{id}', 'Admin\\RoleController@destroy');

});
