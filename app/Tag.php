<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Polymorphic to videos and posts
    public function showVideosByTag(){
        return $this->morphedByMany('App\Video','taggable');
    }

    public function showPostsByTag(){
        return $this->morphedByMany('App\Post','taggable');
    }
}
