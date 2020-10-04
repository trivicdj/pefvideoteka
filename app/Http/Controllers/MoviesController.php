<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Models\Rating;

class MoviesController extends Controller
{
    public function index(){
        $movies = Movie::all();

        return view('movies.index')->with('movies', $movies->load(['genre']));
    }

    public function show(Movie $movie){
        return view('movies.show')->with('movie', $movie->load(['genre']));
    }

    public function rate(Request $request) {
        $validatedRequest = $this->validate($request, [
            'rating' => 'required|integer|between:1,10',
            'movie_id' => 'required|exists:movies,id',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        Rating::create([
            'rating' => $validatedRequest['rating'],
            'movie_id' => $validatedRequest['movie_id'],
            'user_id' => !empty($validatedRequest['user_id']) ? $validatedRequest['user_id'] : null
        ]);

        $movie = Movie::find($validatedRequest['movie_id']);

        return redirect('/movies/' .  $validatedRequest['movie_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        if($movie->photo){
            Storage::delete('public/movie-photos/'. $movie->photo);
        }
        
        $movie->delete();

        return redirect('/dashboard');
    }
}
