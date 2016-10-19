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

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::post('/signup', "userController@postSignup")->name("signup");
    Route::post('/signin', "userController@postSignin")->name("signin");
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/videos', function() {
        return view('videos', ['videos' => App\Video::all()]);
    })->name('videos');
    Route::get('/watchvid/{id}', function($id) {
        $video = App\Video::where('id', $id);
        return view('watchvid', ['video' => $video]);
    })->name('watchvid');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin:4']], function() {
    Route::get('/', function() {
        return view('admin');
    })->name('admin');
});