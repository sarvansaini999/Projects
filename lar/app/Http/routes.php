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
Route::resource('', 'HomeController');

/*
Route::get('contact', function () {
    return view('welcome');
});
*/
Route::resource('admin', 'AdminController');
Route::resource('rooms', 'RoomstariffController');
Route::resource('about', 'AboutController');
Route::resource('gallery', 'GalleryController');
Route::resource('contact', 'ContactController');