<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Controllers\Controller;
use App\Models\Artist;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        $artists = Artist::all();
        return view('admin.albums.index', compact('albums', 'artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        $val_data = $request->validated();
        $slug = Album::generateSlug($val_data['name']);
        $val_data['slug'] = $slug;

        Album::create($val_data);

        return to_route('albums.index')->with('message', 'Album added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {

        $artists = Artist::all();
        return view('admin.albums.edit', compact('album', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $val_data = $request->validated();
        $slug = Album::generateSlug($val_data['name']);
        $val_data['slug'] = $slug;

        $album->update($val_data);

        return to_route('albums.index')->with('message', 'Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
