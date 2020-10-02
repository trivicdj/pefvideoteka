<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Movie;

class Genre extends Model
{
    protected $table = "genres";

    public function genre()
    {
        return $this->hasMany(Movie::class);
    }
}
