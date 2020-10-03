<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Movie;
use User;

class Rating extends Model
{
    protected $table = "ratings";

    protected $fillable = [
        'rating', 'movie_id', 'user_id'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
