<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {

        $artists = Artist::with(['albums'])->paginate(6);

        /* WATCHOUT GENRES */

        return response()->json([
            'status' => true,
            'artists' => $artists
        ]);
    }
}