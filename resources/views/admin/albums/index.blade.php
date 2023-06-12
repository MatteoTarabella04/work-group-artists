@extends('layouts.admin')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="create">
            <form action="{{ route('albums.store') }}" method="post">

                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name">
                    <small id="helpId" class="form-text text-muted">Required, max 100 charachters</small>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="text" class="form-control @error('cover') is-invalid @enderror" name="cover"
                        id="cover">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="release_date"
                        id="date">
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
        <div class="row">
            @forelse ($albums as $album)
                <div class="card" style="width:18rem;">
                    <img src="{{ $album->cover }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <h5 class="card-title">{{ $album->artist?->name }}</h5>
                    </div>
                </div>

            @empty
                <p> Nothing</p>
            @endforelse
        </div>
    </div>
@endsection
