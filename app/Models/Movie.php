<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Genre;

class Movie extends Model
{
    protected $table = "movies";

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
