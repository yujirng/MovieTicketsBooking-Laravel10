<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\UserController;
use App\Models\Feedback;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            GenresSeeder::class,
            MovieSeeder::class,
            TheaterSeeder::class,
            ScreenSeeder::class,
            FeedbackSeeder::class,
            UserSeeder::class
        ]);
    }
}
