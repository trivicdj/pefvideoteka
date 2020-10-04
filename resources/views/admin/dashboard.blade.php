@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Movies Admin Dashboard</div>

                <div class="panel-body">
                    {{-- <a href="/movies/create" class="btn btn-primary">Create Movie</a> --}}
                    <h3>Your Movies</h3>
                    @if(count($movies) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Rating</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{$movie->name}}</td>
                                    <td>{{$movie->description}}</td>
                                    <td>{{$movie->avg_rating}}</td>
                                    <td><a href="/movies/{{$movie->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['MoviesController@destroy', $movie->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no movies</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
