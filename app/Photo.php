<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //polymorphic relationship
    public function imageable(){
        return $this->morphTo();
    }
}
