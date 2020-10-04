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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|nullable|max:1999',
            'genre' =>  'required|exists:genres,id',
        ]);

        if($request->hasFile('photo')){
            $filenameWithExt = $validatedRequest->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $validatedRequest->file('photo')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $validatedRequest->file('photo')->storeAs('public/movie-photos', $fileNameToStore);
        }

        Movie::create([
            'name' => $validatedRequest['name'],
            'description' => $validatedRequest['description'],
            'photo' => $validatedRequest['description'],
            'genre_id' => $validatedRequest['genre'],
        ]);

        return redirect('/dashboard');
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
