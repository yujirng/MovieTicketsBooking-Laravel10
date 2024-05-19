<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'quantity',
        'screen_name',
        'theater_id',
    ];

    public function theater(): BelongsTo
    {
        return $this->belongsTo(Theater::class);
    }
}
