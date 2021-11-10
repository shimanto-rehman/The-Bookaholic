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
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/about-us', function(){
	return view('about');
});

Route::get('/profile/{id}', 'ProfileController@showProfile');

Route::get('/book/{id}', 'BookController@showBook');
Route::post('/book/{id}/' , 'BookController@postChange');
Route::get('/book/{book_id}/{target_id}','BookController@postRequest');

Route::get('/search-page', 'SearchController@showBookList');
Route::post('/search-page/', 'SearchController@postBookList');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/share-book','BookController@addBook');
Route::post('/share-book/','BookController@postBook');

Route::get('/profile/{id}/notification','ProfileController@getNotification');

Route::get('/profile/{id}/notification/{other_id}/{book_id}/{type}','ProfileController@back_redirect');

Route::get('/address/{id}','InformationCollector@getAddress');
Route::post('/address/{id}/','InformationCollector@postAddress');

Route::get('/profile/{id}/about','ProfileController@getAbout');
Route::post('/profile/{id}/about/','ProfileController@postAbout');
