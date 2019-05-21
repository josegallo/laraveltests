@extends('layouts.app')
@section ('content')
    This is the contact Page.
    Some of the members are:
    <br>
        @if(count($people))  
            @foreach($people as $person)
                {{$person}}, 
            @endforeach
            ...
        @endif
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
