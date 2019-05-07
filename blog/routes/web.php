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

// //Authentication Routes
// Route::get('auth/login', 'Auth\LoginController@getLogin');
// Route::post('auth/login', 'Auth\LoginController@postLogin');
// Route::get('auth/logout', 'Auth\LoginController@getLogout');

// //Registration Routes
// Route::get('auth/register', 'Auth\RegisterController@getRegister');
// Route::post('auth/register', 'Auth\RegisterController@postRegister');




// // Authentication Routes
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
   
// // Registration Routes
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog',['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('/contact','PagesController@getContact');

Route::post('/contact','PagesController@postContact');

Route::get('/about', 'PagesController@getAbout');

Route::get('/', 'PagesController@getIndex');

Route::resource('posts', 'PostController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
//This give us all the additiona routes for all the crud functions except create. 

//Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Comments
//Route::resource('comments', 'CommentsController',['except' => ['create']]);

Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit',['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}',['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete',['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);