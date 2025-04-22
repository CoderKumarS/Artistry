<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
class Artist extends Eloquent
{
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function artworks()
    {
        return $this->hasMany(Artwork::class, 'artistId');
    }
}
