<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'release_date',
        'genre_id',
        'language',
        'trailer_link',
        'description',
        'image',
        'status',
        'running',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
