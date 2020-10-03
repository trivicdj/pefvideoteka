@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Movies</div>

                <div class="panel-body">
                    <a href="/movies/create" class="btn btn-primary">Create Movie</a>
                    <h3>Movies</h3>
                    @if(count($movies) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{$movie->name}}</td>
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
