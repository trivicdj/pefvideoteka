<?php

namespace App\Observers;

use App\Models\Rating;
use App\Models\Movie;

class RatingObserver
{
    /**
     * Handle the rating "created" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function created(Rating $rating)
    {
        $newAverageRating = Rating::where('movie_id', $rating->movie_id)->avg('rating');

        $movie = Movie::find($rating->movie_id);
        $movie->avg_rating = $newAverageRating;
        
        $movie->save();
    }
}
