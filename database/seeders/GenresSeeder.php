<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Genre::factory()->count(10)->create();
        $genreNames = ['Action', 'Adventure', 'Comedy']; // Array of genre names

        foreach ($genreNames as $genreName) {
            Genre::factory()->create([
                'genre_name' => $genreName,
            ]);
        }
    }
}
