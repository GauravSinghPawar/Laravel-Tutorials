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

Route::get('/home', 'DataController@index')->name('home');


//Route::get('/show_data', 'DataController@index')->name('showData');

Route::resource('data', 'DataController');


//Route for testing the two new middleware 1)Trim Empty Spaces from Strings  2)Convert empty strings to NULL 

Route::get('/form', 'HomeController@index')->name('form');
Route::post('/form', 'HomeController@formPost')->name('form.submit');
