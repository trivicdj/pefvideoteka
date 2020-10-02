<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Movie;
use User;

class Rating extends Model
{
    protected $table = "movies";

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
