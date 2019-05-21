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
    $results = DB::select('select * from posts where id = ?',[3]);
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
Route::get ('deleteQuery', function(){
    $delete = DB::delete('delete from posts where id =? ',[3]);
    return $delete;
});