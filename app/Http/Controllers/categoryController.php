<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\VideoCategory;
use App\Http\Requests;

class categoryController extends Controller
{
    public function deleteCategory(Request $request) {
        Video::where('category', $request['id'])->update(['category' => 1]);
        if (VideoCategory::destroy($request['id']))
            return response()->json(['text' => 'Successfully deleted.', 'type' => 'info']);
        return response()->json(['text' => 'Failed.', 'type' => 'error']);
    }

    public function addCategory(Request $request) {
        $cate = new VideoCategory();
        $cate->catename = $request['catename'];
        if ($cate->save())
            return response()->json(['text' => 'Successfully added.', 'type' => 'info']);
            return response()->json(['text' => 'Failed.', 'type' => 'error']);
    }

    public function editCategory(Request $request) {
        if (VideoCategory::where('id', $request['id'])->update(['catename' => $request['catename']]))
            return response()->json(['text' => 'Successfully updated.', 'type' => 'info']);
        return response()->json(['text' => 'Failed.', 'type' => 'error']);
    }
}
