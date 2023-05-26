<?php

namespace Database\Seeders;

use App\Models\Artist;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $artist = new Artist();
            $artist->name = $faker->name();
            $artist->image = $faker->imageUrl(category: 'Artist', format: 'jpg');
            $artist->genre = $faker->randomElement(['Jazz', 'Rock', 'Rap']);
            $artist->birth_date = $faker->date();
            $artist->death_date = $faker->date();
            $artist->save();
        }
    }
}
