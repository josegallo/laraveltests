<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource without parameters
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); //posts is an array
        return view('posts.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->get('title'); //returns a string
        // return $request->title; //also works, return a strig
        // return $request->all(); //it is a array
        // return $request->all()['title']; //also works, it is a string

        //1st way
        // $post = new Post;
        // $post->user_id = $request->user_id;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        //2nd way and best way
        Post::create($request->all()); //request->all is an array
        return redirect ('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "this is for edit post number " . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Show contact view.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $people = ['Jose', 'Jimena', 'Adela', 'Edwin', 'Loli', 'Adelin'];
        return view('contact', compact('people'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showPost($id, $name, $surname)
    {
        // return "this is the show methdod !! for the post " . $id;
        // return view('post')->with('id',$id);
        return view ('post', compact('id','name','surname'));
    }
}
