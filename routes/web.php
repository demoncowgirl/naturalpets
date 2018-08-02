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

Route::get('/', 'PagesController@getHome');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::get('profile', 'PagesController@getProfile');
Route::get('petSearch', 'PagesController@getPetSearch');
Route::get('vetServices', 'PagesController@getVetServices');
Route::get('kennels', 'PagesController@getKennels');
Route::get('groomers', 'PagesController@getGroomers');
Route::get('petSupplies', 'PagesController@getPetSupplies');
Route::get('serviceSearch', 'PagesController@getPetServices');

Route::get('messages', 'PagesController@getMessages');

Route::get('search', 'SearchController@getSearchResults');

// this will add a csrf code to profile
// Route::post('profile',
//     [
//         'before' => 'csrf',
//         function()
//         {
//             //
//         }
//     ]
// );

// Route::post('/contact', 'MessagesController@submit');
// Route::get('/messages', 'MessagesController@getMessages');
// Route::post('/profile', 'ProfileCRequest@submit');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
