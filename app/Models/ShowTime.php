<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

    protected $table = 'showtimes';

    protected $fillable = [
        'movie_id',
        'theater_id',
        'screen_id',
        'room_id',
        'showtime',
        'price',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
