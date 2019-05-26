<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //polymofphic (many to many) to tag
    public function showTagsByVideo(){
        return $this->morphToMany('App\Tag','taggable');
    }
}

