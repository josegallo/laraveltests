@extends('layouts.app')
@section ('content')

    This is the index of posts:
    <br>
    <br>
    <ul>
    @php ($i = 0)
    @foreach ($posts as $post) 
        <li>
        @php ($i++)
        Post {{$i}} : <a href = "{{ route('posts.show', $post->id)}}"> {{ $post->title}} </a> (id: {{ $post->id}})
        </li>
    @endforeach
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
