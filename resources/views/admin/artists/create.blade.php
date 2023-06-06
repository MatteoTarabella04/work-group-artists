@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('artists.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" name="name"
                    id="name" aria-describedby="helpId" placeholder="">
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
                @enderror"
                    name="image" id="image" aria-describedby="helpId" placeholder="">
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
                    <option value="rock">Rock</option>
                    <option value="jazz">Jazz</option>
                    <option value="rap">Rap</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" class="form-control @error('name') is-invalid
                @enderror"
                    name="birth_date" id="birth_date" aria-describedby="helpId" placeholder="">
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
                    placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
