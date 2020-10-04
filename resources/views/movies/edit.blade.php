@extends('layouts.app')

@section('content')
    <h1>Create Movie</h1>
    {!! Form::open(['action' => 'MoviesController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $movie->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::text('description', $movie->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        Genre: <div>
            {!!  Form::select(
                'genre',  
                [1 => 'Thriller', 2 => 'Drama', 3 => 'Action', 4 => 'Commedy'], 
                ['class' => 'form-control'],
                $movie->genre_id
                ) 
            !!}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
