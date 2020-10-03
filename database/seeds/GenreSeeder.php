<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('dummy-genres') as $genre) {
            Genre::create([
                'name' => $genre['name'],
            ]);
        }
    }
}