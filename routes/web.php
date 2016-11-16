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
    Route::post('/postsignup', "userController@postSignup")->name("postsignup");
    Route::post('/postsignin', "userController@postSignin")->name("postsignin");
    Route::get('/signup', function() {
        return view('signup');
    })->name('signup');
    Route::get('/signin', function() {
        return view('signin');
    })->name('signin');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('home')->withErrors(['notify.success' => 'Logout|Successfully logged out.']);
    })->name('logout');
    Route::get('/dashboard', function() {
        return view('dashboard.dashboard');
    })->name('dashboard');
    /*Route::get('/videos', function() {
        if (Auth::user()->class <= 2)
            $videos = App\Video::where('published', 1)->paginate(10);
        else
            $videos = App\Video::paginate(10);
        return view('dashboard.videos', ['videos' => $videos]);
    })->name('videos');
    Route::get('/watchvid/{id}', function($id) {
        $video = App\Video::where((Auth::user()->class <= 2)?([['id', $id],['published', 1]]):([['id', $id]]));
        if ($video->count())
            return view('dashboard.watchvid', ['video' => $video]);
        else
            return redirect()->route('videos')->withErrors(['notify.error' => 'Watch video|Please present a valid id!']);
    })->name('watchvid');*/
});

/*Route::group(['middleware' => ['auth', 'admin:2']], function() {
    Route::get('/submitvideo', function() {
        return view('dashboard.submitvideo');
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
        return view('dashboard.videos', ['videos' => $videos, 'tag' => $tag]);
    })->name('videos_tag');
    Route::post('/editvideo', "videoController@editVideo")->name('editvideo');
    Route::get('/editcategory', function() {
        return view('dashboard.editcategory');
    })->name("editcategory");
    Route::post('/posteditcategory', "categoryController@editCategory")->name('posteditcategory');
    Route::post('/postdelcategory', "categoryController@deleteCategory")->name('postdelcategory');
    Route::post('/postaddcategory', "categoryController@addCategory")->name('postaddcategory');
});*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin:4']], function() {
    Route::get('/', function() {
        $users = App\user::paginate(10);
        return view('dashboard.admin', ['users' => $users]);
    })->name('admin');
    //Route::get('/deletevideo/{id}', "videoController@deleteVideo")->name('deletevideo');
    Route::get('/getrstudiocpu', function() {
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://' . getenv('DOCKER_HOST') . '/containers/rstudio/stats?stream=0');
        $j = json_decode($res->getBody());
        echo sprintf("%.2f", 100.00 * count($j->cpu_stats->cpu_usage->percpu_usage) * ($j->cpu_stats->cpu_usage->total_usage - $j->precpu_stats->cpu_usage->total_usage) / ($j->cpu_stats->system_cpu_usage - $j->precpu_stats->system_cpu_usage));
    });
    Route::get('/getuserinfo/{id}', function($id) {
        $user = App\user::find($id);
        return $user->toJson();
    });
    Route::get('/togglerstudio/{id}', function($id) {
        return (App\Http\Controllers\platformController::toggleRstudio($id, !((bool) App\user::find($id)->rstudio)) ? 'success' : 'failed');
    });
    Route::get('/togglejupyter/{id}', function($id) {
        return (App\Http\Controllers\platformController::toggleJupyter($id, !((bool) App\user::find($id)->jupyter)) ? 'success' : 'failed');
    });
});