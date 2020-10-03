@extends('layouts.app')

@section('content')
    <a href="/movies" class="btn btn-default">Go Back</a>
    <div class="content-flex content-center-horizontal">
        <h1>{{$movie->name}}</h1>
    </div>
    <div class="content-flex content-center-horizontal">
        <img style="width:50%" src="/storage/movie-photos/{{$movie->photo}}">
    </div>
    <br><br>
    <div class="content-flex content-center-horizontal">
        {{$movie->description}}
    </div>
    <div class="panel panel-default margin-default">
        <div class="panel-body">
        <div class="content-flex content-space-between">
            <div class="w-50">
                @include('includes.rater')
            </div>
            <div class="content-flex content-end w-50">
                Rating: {{ $movie->avg_rating }}
            </div>
        <div>
    </div>
@endsection
