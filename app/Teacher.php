<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //polymorphic reaction
    public function showPhotosPerTeacher (){
        return $this->morphMany('App\Photo','imageable');
    }
}
