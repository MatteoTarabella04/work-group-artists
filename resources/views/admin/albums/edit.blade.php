@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('albums.update', $album->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ $album->name }}">
                <small id="helpId" class="form-text text-muted">Required, max 100 charachters</small>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="text" class="form-control @error('cover') is-invalid @enderror" name="cover"
                    id="cover" value="{{ $album->cover }}">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="release_date"
                    id="date" value="{{ $album->release_date }}">
            </div>
            <div class="mb-3">
                <label for="artist_id" class="form-label">Artists</label>
                <select class="form-select @error('artist_id') is-invalid @enderror" name="artist_id" id="artist_id">
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}" {{ $artist->id == old('artist_id', '') ? 'selected' : '' }}>
                            {{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
