{!! Form::open(['action' => ['MoviesController@rate', $movie->id], 'method' => 'PUT']) !!}
    {!!  Form::select(
        'rating',  
        ['1'=> 1, '2'=> 2, '3'=> 3, '4'=> 4, '5'=> 5, '6'=> 6, '7'=> 7, '8'=> 8, '9'=> 9, '10'=> 10], 
        ['class' => 'form-control']) 
    !!}
    {{Form::hidden('movie_id', $movie->id)}}
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Rate')}}
{!! Form::close() !!}
