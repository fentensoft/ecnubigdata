<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function cate() {
        return $this->belongsTo('App\VideoCategory', 'category');
    }

    public function pub() {
        return $this->belongsTo('App\user', 'publisher');
    }
}
