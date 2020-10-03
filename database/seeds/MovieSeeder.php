<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Genre;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('dummy-movies') as $movie) {
            Movie::create([
                'name' => $movie['name'],
                'description' => $movie['description'],
                'photo' => $movie['photo'],
                "genre_id" => Genre::where('name', $movie['genre'])->first()->id
            ]);
        }
    }
}