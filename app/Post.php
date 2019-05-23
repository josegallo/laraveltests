<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //the table has to be posts if not has to be declared:
    protected $table = 'posts';
    //the table has to have a primarykey name id, if not has to be declared: 
    protected $primaryKey = 'id';
    //make writable the columns of the post table, so we can create posts
    protected $fillable = [
            'title',
            'content',
            'created_at'
        ];
    //use SoftDeletes for adding post to trash (not permanetly)
    use SoftDeletes;
    //let know laravel treat this table as a timestamp column, declare the storage format of the column
    protected $dates = ['deleted_at'];
}
