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

Route::get('/home', 'PagesController@getHome');
Route::get('loginSuccessful', 'PagesController@getLoginSuccessful');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::get('profile', 'PagesController@getProfile');
Route::get('petSearch', 'PagesController@getPetSearch');
Route::get('vetServices', 'PagesController@getVetServices');
Route::get('kennels', 'PagesController@getKennels');
Route::get('groomers', 'PagesController@getGroomers');
Route::get('petSupplies', 'PagesController@getPetSupplies');
Route::get('serviceSearch', 'PagesController@getPetServices');
Route::get('elliesList', 'PagesController@getList');
Route::get('loveOurPets', 'PagesController@getLove');
Route::get('messages', 'PagesController@getMessages');
Route::get('users', 'PagesController@getUsers');
Route::get('search', 'SearchController@getSearchResults');


// Route::get('/{id}', function ($id){
//   return view('id',{'id'=> $id});
// });
Route::get('messages/{id}', 'MessagesController@index');
Route::post('/contact', 'MessagesController@submit');
Route::post('messages/{messages}', 'RetrieveMsMsgsController@update');
Route::post('/inputMessages', 'MessagesController@inputMessages');
// Route::post('/profile', 'ProfileRequest@submit');


Auth::routes();
Route::get('/', function(){
  return view ('home');
});
