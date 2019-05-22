<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', 'PostController@contact');

Route::get('/post/{id}/{name}/{surname}', 'PostController@showPost');

Route::resource('posts','PostController');

// Route::get('/about', function () {
//     return "hi! this is about page";
// });

// Route::get('/admin/profile/users', array( 'as'=>'admin.users', function () {
//     $url = route('admin.users');
//     return "the url is " . $url;
// }));


/*
|--------------------------------------------------------------------------
| Database Raw SQL queries
|--------------------------------------------------------------------------
*/

// insert data

Route::get('/insertquery', function () {
    DB::insert('insert into posts(title, content) values (?,?)',['Laravel PHP','Laravel is an insteresing framework for working with PHP']);
});

Route::get('/insertqueryurl/{title}/{content}', function ($title,$content) {
    $date = new DateTime();
    $date = $date->format('Y-m-d H:i:s');
    DB::insert('insert into posts(title, content,created_at) values (?,?,?)',[$title,$content,$date]);
});

//read data
Route::get('/readQuery', function(){
    $results = DB::select('select * from posts');
    // return $results;
    // return var_dump($results);
    // $results = DB::select('select * from posts where id = ?',[3]);
    $results = DB::select('select * from posts');
    foreach ($results as $post) {
        echo "<ul> - " .$post->title . " " .$post->content . " created at: " .$post->created_at. "</ul>";   
    }
});

//update data

Route::get('/updateQuery', function(){
    $update = DB::update('update posts set title ="post 4 title" where id = ?',[4]);
    return $update;
});

//delete date
Route::get ('/deleteQuery', function(){
    $delete = DB::delete('delete from posts where id =? ',[3]);
    return $delete;
});

/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
*/

//read all the posts 

use App\post;

Route::get('read/', function(){
    $posts = Post::all();
    foreach ($posts as $post) {
        echo "<ul> - " .$post->title . " " .$post->content . " created at: " .$post->created_at. "</ul>";  
    }
});

//find and show all the posts 

Route::get('/findPostTitle/{id}', function($id){
    $postFound = Post::find($id);
    return "Post Title: " . $postFound->title . " " . "Post Content: " . $postFound->content; 
});

//find with where condition
Route::get('findwhere', function(){
    // $postWhere= Post::where('id', 7 )->orderBy('id','desc')->take(1)->get();
    // $postWhere= Post::where('id', 7 )->get();
    $postWhere= Post::where('id', '<', 10)->get();
    return $postWhere;
});

//find o give not found
Route::get('findMore', function(){
    $postMore = Post::findOrFail(5);
    return $postMore;
});

//insert Data basic
Route::get('/insertbasic', function(){
    $postToInsert = new Post;
    $postToInsert->title = 'Another Title x';
    $postToInsert->content = 'Another Title for everyone x.';
    $postToInsert->save();
});

//update Data

Route::get('/updatebasicpost/{id}', function($id){
    $postToUpdate = Post::find($id);
    // return $postToUpdate;
    $postToUpdate->title = 'Another Title ' .$id ;
    $postToUpdate->content = "Another Title $id for everyone";
    $postToUpdate->save();
});