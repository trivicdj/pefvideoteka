<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use User;

class Role extends Model
{
    protected $table = "roles";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', '=', $name);
    }
}
