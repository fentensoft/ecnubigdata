<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class videoController extends Controller
{
    public function submitVideo(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:64',
            'description' => 'required|max:254',
            'vidid' => 'required|max:254'
        ]);

        $video = new Video();
        $video->title = $request['title'];
        $video->description = $request['description'];
        $video->vidid = $request['vidid'];
        $video->publisher = Auth::user()->id;
        $video->published = 0;
        $video->category = 1;

        $msg = 'Submit failed.';
        if ($video->save())
            $msg = 'Success.';

        return redirect()->route('submitvideo')->withErrors(['notify.info' => $msg]);
    }

    public function editVideo(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:64',
            'description' => 'required|max:254',
        ]);

        $video = Video::find($request['id']);
        $video->title = $request['title'];
        $video->description = $request['description'];
        $video->category = $request['category'];
        $video->published = ($request['published'] == 'on')?1:0;

        $msg = 'Submit failed.';
        if ($video->update())
            $msg = 'Success.';

        return redirect()->back()->withErrors(['notify.info' => $msg]);
    }
}
