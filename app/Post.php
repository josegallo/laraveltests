<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //the table has to be posts if not has to be declared:
        protected $table = 'posts';
    //the table has to have a primarykey name id, if not has to be declared: 
        protected $primaryKey = 'id';
    //make writable the columns of the post table
        protected $fillable = [
            'title',
            'content',
            'created_at'
        ];
}
