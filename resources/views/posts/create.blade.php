@extends('layouts.app')
@section ('content')
<form method = 'post' action="/posts">@csrf 
    <input type="text" name = 'title' placeholder='Enter title'>
    <input type="text" name = 'content' placeholder='Enter content'>
    <input type="number" name = 'user_id' placeholder='Enter user_id'>
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
