@extends('layouts.app')

@section('content')
    <a href="/movies" class="btn btn-default">Go Back</a>
    <div class="center-content">
        <h1>{{$movie->name}}</h1>
    </div>
    <div class="center-content">
        <img style="width:50%" src="/storage/movie-photos/{{$movie->photo}}">
    </div>
    <br><br>
    <div class="center-content">
        {{$movie->description}}
    </div>
    <hr>
@endsection
