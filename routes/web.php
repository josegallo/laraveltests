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

Route::get('/read', function(){
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

//create multiple records
Route::get('/createonepost/{id}/{user_id}', function ($id, $user_id){
    Post::create(['title'=>'What is up men? '.$id, 'user_id'=> $user_id, 'content'=>'Impresive, massive, great, awasome and cool! '.$id ]);
});

//update
Route::get('/updateeloquent/{id}', function($id){
    Post::where('id',$id)->where('is_admin',0)->update(['title'=>'Title Sup '. $id, 'content'=>'This is the new content updated for post '. $id]);
});

//delete 1st method
Route::get('/deleteeloquent/{id}', function($id){
    $postToDelete = Post::find($id);
    $postToDelete->delete();
});

//delete 2nd method
Route::get('/deleteelequent2/{id}', function($id){
    // Post::destroy('id',$id);
    Post::destroy($id);
});

//delete multiple posts 
Route::get('/deleteelequent3/{id1}/{id2}/{id3}', function($id1, $id2, $id3){
    // Post::destroy('id',$id);
    Post::destroy($id1, $id2, $id3);
});

//softdeletes
Route::get('/softdeletes/{id}', function($id){
    Post::find($id)->delete();
});

//show deleted posts method 1
Route::get('/readsoftdeletedposts1',function(){
    $softDeletedPosts = Post::withTrashed()->where('deleted_at','!=','NULL')->get();
    // return $softDeletedPosts;
    foreach ($softDeletedPosts as $post) {
        echo "<ul> - " .$post->title . " " .$post->content . " deleted at: " .$post->deleted_at. "</ul>";  
    }
});

//show deleted posts method 2
Route::get('/readsoftdeletedposts2',function(){
    $softDeletedPosts2 = Post::onlyTrashed()->get();
    // return $softDeletedPosts;    
    foreach ($softDeletedPosts2 as $post) {
        echo "<ul> - " .$post->title . " " .$post->content . " deleted at: " .$post->deleted_at . "</ul>";  
    }
});

//restore specific softtrashed
Route::get('/restoresofttrashed/{id}', function($id){
    // $postToRestore = Post::onlyTrashed()->where('id', $id )->get();
    Post::onlyTrashed()->where('id', $id )->restore();
});

//delete permanently a record
Route::get('forcedelete/{id}', function($id){
    Post::where('id',$id)->forcedelete();
});

//delete permannetly softdeleted(trashed elements)
Route::get('forcedeletetrashed', function(){
    Post::onlyTrashed()->forcedelete();
});

use App\user;
//create user
Route::get('createuser/{name}/{email}/{password}', function($name, $email, $password){
    User::create(['name'=> $name, 'email'=> $email, 'password'=>$password]);
});

//show all the users per user
Route::get ('showpostperuser1/{id}',function($id){
    $postPerUser = Post::where('user_id', $id)->get();
    return $postPerUser;
});

/*
|--------------------------------------------------------------------------
| Eloquent Relationships
|--------------------------------------------------------------------------
*/

//One to one relationship. show 1 post per user
Route::get ('show1postperuser/{id}',function($id){
    return User::find($id)->post;
});

//One to many relationship. show all posts per user
Route::get ('showpostperuser2/{id}',function($id){
    return User::find($id)->posts;
});