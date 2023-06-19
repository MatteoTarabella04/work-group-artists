<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = config('db.genres');
        foreach ($genres as $genre) {
            $newGenre = new Genre();
            $newGenre->name = $genre['name'];
            $newGenre->slug = Str::slug($newGenre->name);
            $newGenre->save();
        }
    }
}
