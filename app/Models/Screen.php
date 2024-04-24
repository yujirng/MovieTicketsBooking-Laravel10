<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater_id',
        'screen_name',
    ];

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}
