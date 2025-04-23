<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Artist extends Model
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
