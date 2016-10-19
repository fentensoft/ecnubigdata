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
        return redirect()->route('home')->withErrors(['message' => 'Successfully logged out.']);
    })->name('logout');
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/videos', function() {
        if (Auth::user()->class <= 2)
            $videos = App\Video::where('published', 1)->paginate(10);
        else
            $videos = App\Video::paginate(10);
        return view('videos', ['videos' => $videos]);
    })->name('videos');
    Route::get('/watchvid/{id}', function($id) {
        $video = App\Video::where((Auth::user()->class <= 2)?([['id', $id],['published', 1]]):([['id', $id]]));
        if ($video->count())
            return view('watchvid', ['video' => $video]);
        else
            return redirect()->route('videos')->withErrors(['message' => 'Please present a valid id!']);
    })->name('watchvid');
});

Route::group(['middleware' => ['auth', 'admin:2']], function() {
    Route::get('/submitvideo', function() {
        return view('submitvideo');
    })->name('submitvideo');
    Route::post('/postsubmitvideo', "videoController@submitVideo")->name('postsubmitvideo');
});

Route::group(['middleware' => ['auth', 'admin:3']], function() {
    Route::get('/videos/{tag}', function($tag) {
        switch ($tag) {
            case "Unpublished": $videos = App\Video::where('published', 0)->paginate(10);break;
            case "Published": $videos = App\Video::where('published', 1)->paginate(10);break;
            default:
                $cate = App\VideoCategory::where('catename', $tag);
                if ($cate->count())
                    $videos = App\Video::where('category', $cate->first()->id)->paginate(10);
                else
                    return redirect()->route('videos');
        }
        return view('videos', ['videos' => $videos, 'tag' => $tag]);
    })->name('videos_tag');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin:4']], function() {
    Route::get('/', function() {
        return view('admin');
    })->name('admin');
});