<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //make writable the columns of the roles table, so we can create users
       protected $fillable = [
        'id',
        'name'
    ];
}
