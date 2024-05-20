<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'release_date',
        'cens',
        'trailer_link',
        'description',
        'director_id',
        'image',
        'status',
        'running',
    ];

    // public function genre()
    // {
    //     return $this->belongsTo(Genre::class);
    // }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actors()
    {
        // return $this->belongsToMany(Actors::class, 'movie_actor'); actors_id
        return $this->belongsToMany(Actor::class, 'movie_actor', 'movie_id', 'actor_id');
    }

    public function showTimes(): HasMany
    {
        return $this->hasMany(ShowTime::class);
    }
}
