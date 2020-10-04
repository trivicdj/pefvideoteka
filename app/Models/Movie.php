<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Rating;

class Movie extends Model
{
    protected $table = "movies";

    protected $fillable = [
        'name', 'description', 'genre_id', 'photo'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
