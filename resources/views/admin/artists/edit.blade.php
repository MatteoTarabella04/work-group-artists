@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('artists.update', $artist->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
           @enderror" name="name"
                    id="name" aria-describedby="helpId" placeholder="" value="{{ old('name', $artist->name) }}">
                <small id="helpId" class="form-text text-muted">Field Required, max 100 charachters</small>
            </div>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    <h6 class="alert-heading">{{ $message }}</h6>
                </div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control @error('image') is-invalid
           @enderror" name="image"
                    id="image" aria-describedby="helpId" placeholder="" value="{{ old('image', $artist->image) }}">
                <small id="helpId" class="form-text text-muted">Field Required, max 200 charachters</small>
            </div>
            @error('image')
                <div class="alert alert-danger" role="alert">
                    <h6 class="alert-heading">{{ $message }}</h6>
                </div>
            @enderror
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select class="form-select form-select-lg" name="genre" id="genre">

                    -- to chechk --
                    <option selected value="{{ old('genre', $artist->genre) }}">{{ old('genre', $artist->genre) }}</option>

                    <option value="rock">Rock</option>
                    <option value="jazz">Jazz</option>
                    <option value="rap">Rap</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" class="form-control @error('name') is-invalid
           @enderror" name="birth_date"
                    id="birth_date" aria-describedby="helpId" placeholder=""
                    value="{{ old('birth_date', $artist->birth_date) }}">
                <small id="helpId" class="form-text text-muted">Field Required</small>
            </div>
            @error('birth_date')
                <div class="alert alert-danger" role="alert">
                    <h6 class="alert-heading">{{ $message }}</h6>
                </div>
            @enderror
            <div class="mb-3">
                <label for="death_date" class="form-label">Death Date</label>
                <input type="date" class="form-control" name="death_date" id="death_date" aria-describedby="helpId"
                    placeholder="" value="{{ old('death_date', $artist->death_date) }}">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
