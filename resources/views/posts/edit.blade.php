@extends('layouts.app')
@section ('content')
<h1>Edit Post</h1>
<form method = 'post' action="/posts/{{$post->id}}">@csrf 
    <input type="hidden" name = '_method' value = "PUT">
    <input type="text" name = 'title' placeholder='Enter title' value = "{{$post->title}}">
    <input type="text" name = 'content' placeholder='Enter content' value = "{{$post->content}}">
    <input type="number" name = 'id' placeholder='post id' value = "{{$post->id}}">
    <input type="submit" name = 'submit'>
</form>
@stop
@section ('footer')
    <div id="yearDate"></div>
    <script> 
        console.log ('this is the footer on contact');
        var d = new Date();
        var n = d.getFullYear();
        document.getElementById("yearDate").innerHTML = 'Copyright @ ' + n;
    </script>
@stop
