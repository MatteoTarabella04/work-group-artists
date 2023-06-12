<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $album = new Album();
            $album->name = $faker->word();
            $album->slug = Str::slug($album->name);
            $album->cover = $faker->imageUrl(category: 'album', format: 'jpg');
            $album->release_date = $faker->date();
            $album->artist_id = $faker->numberBetween(1, 10);
            $album->save();
        }
    }
}
