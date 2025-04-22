<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
class Artwork extends Eloquent
{
    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artistId');
    }
}
