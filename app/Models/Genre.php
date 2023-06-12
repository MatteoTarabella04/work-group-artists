<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'album_id'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }
}

/* 
TODO
php artisan migrate
seed
finire il collegamento delle releazioni e proseguire con le task
*/