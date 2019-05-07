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
    return view('home');
});


Route::get('/articles/create', 'ArticlesController@create');


Route::post('/articles/submit', 'ArticlesController@submit');


Route::get('home2', function () {
   $processors = ['Intel i7', 'Intel i5', 'Intel i3', 'AMD A10'];

   $num1 = 45;
   $num2 = 23;

    return view('home2')->with('processors', $processors)->with('num1',$num1)->with('num2',$num2);

});

Route::get('/user/{id}', function ($id) {
    return 'user'.$id;
});

Route::get('/comment/{username}', function ($username) {
     return $username.' left a comment';
});

Route::get('/comment/{username}/{id}', function ($username,$id) {
    return view('welcome',['username'=>$username,'id'=>$id]);
});
//or
Route::get('/comment/{username}/{id}', function ($username,$id) {
    return view('welcome')->with('username',$username)->with('id',$id);
});



Route::get('about', 'AboutController@index');

/*Route::get('/about', function () {
  return "About Us Ha ha";
});
*/

Route::get('another', 'AboutController@another');
