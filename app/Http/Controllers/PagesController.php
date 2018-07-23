<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Route::get('protected', ['middleware' => ['auth', 'admin'],
    //   function() {
    //     return "Access to this page requires Admin login";
    //   }]);
    Route::get('/', function () {
        return view('home');
    }
    Route::get('/about', function () {
        return view('about');
    }
    Route::get('/contact', function () {
        return view('contact');
    }
    //need a get for profile information
    Route::get('/profile', function () {
        return view('profile');
    }
    Route::get('/petSearch', function () {
        return view('petSearch');
    }
    Route::get('/serviceSearch', function () {
        return view('serviceSearch');
    }
    Route::get('/vetServices', function () {
        return view('vetServices');
    }
    Route::get('/kennels', function () {
        return view('kennels');
    }
    Route::get('/groomers', function () {
        return view('groomers');
    }
    Route::get('/petSupplies', function () {
        return view('petSupplies');
    }
}
