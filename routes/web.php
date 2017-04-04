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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){

    Route::get('mesAvatars/{monId}', 'HomeController@showAvatarsList')
        -> name('listAvatars');

    Route::post('mesAvatars/ajouter', 'HomeController@addAvatar')
        -> name('addAvatar')
        -> uses('HomeController@addAvatar');

    Route::delete('mesAvatars/supprimer', 'HomeController@removeAvatar')
        -> name('removeAvatar');

});
Auth::routes();

Route::get('/home', 'HomeController@index');
