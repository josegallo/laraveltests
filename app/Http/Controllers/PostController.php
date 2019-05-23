<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource without parameters
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "this is the index and it is working";
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "I am the method that creates something! YO!!!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "this is the show method !! for the post " . $id;

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
