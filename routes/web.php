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
    Route::get('/access/roles', 'Admin\\RoleController@index');
    Route::post('/access/roles', 'Admin\\RoleController@store');
    Route::get('/access/role/edit/{id}', 'Admin\\RoleController@edit');
    Route::post('/access/role/edit/{id}', 'Admin\\RoleController@update');
    Route::get('/access/role/delete/{id}', 'Admin\\RoleController@destroy');

    /* Permission - Access Control Module */
    Route::get('/access/permissions', 'Admin\\PermissionController@index');
    Route::post('/access/permissions', 'Admin\\PermissionController@store');
    Route::get('/access/permission/edit/{id}', 'Admin\\PermissionController@edit');
    Route::post('/access/permission/edit/{id}', 'Admin\\PermissionController@update');
    Route::get('/access/permission/delete/{id}', 'Admin\\PermissionController@destroy');

    /* User Module */
    Route::get('/users', 'Admin\\UserController@index');
    Route::get('/user/create', 'Admin\\UserController@create');
    Route::post('/user/create', 'Admin\\UserController@store');
    Route::get('/user/edit/{id}', 'Admin\\UserController@edit');
    Route::post('/user/edit/{id}', 'Admin\\UserController@update');

    Route::get('/user/delete/{id}', 'Admin\\UserController@destroy');

});
