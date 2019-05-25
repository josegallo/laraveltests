<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo2 extends Model
{
    //polymorphic relationship photos(imageable)
    public function imageable(){
        return $this->morphTo();
    }

}
