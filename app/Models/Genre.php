<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre_name'];

    public function scopeSearchByName($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where('genre_name', 'LIKE', "%$searchTerm%");
        }

        return $query;
    }
}
