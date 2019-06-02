@extends('layouts.app')
@section ('content')

    This is the post {{ $post->id}}: 
    <ul>
        <li> Tittle: {{ $post->title}} </li>
        <li> Content:  {{ $post->content}} </li>
        <li> id: {{ $post->id}} </li>
        <li> user_id: {{ $post->user_id}} </li>
        <a href = "{{route('posts.edit',$post->id)}} " >Edit post </a>
    </ul>

@stop
@section ('footer')
    <br>
    <div id="yearDate"></div>
    <script> 
        console.log ('this is the footer on contact');
        var d = new Date();
        var n = d.getFullYear();
        document.getElementById("yearDate").innerHTML = 'Copyright @ ' + n;
    </script>
@stop
