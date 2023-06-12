<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','cover','release_date','artist_id', 'genre_id'];

public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

         public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }
}
