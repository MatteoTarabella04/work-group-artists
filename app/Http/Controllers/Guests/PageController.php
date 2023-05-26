<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {

        $artists = Artist::all();

        //dd($artists);

        return view('home', compact('artists'));
    }
    public function about()
    {
        return view('about');
    }
    public function contacts()
    {
        return view('contacts');
    }
}