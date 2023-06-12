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
                        <a class="btn btn-primary" href="albums/{{ $album->id }}/edit" role="button">Edit</a>
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal-{{ $album->id }}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        </td>
                        </tr>
                    </div>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="deleteModal-{{ $album->id }}" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Delete Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this album?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="{{ route('albums.destroy', $album->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p> Nothing</p>
            @endforelse
        </div>
    </div>
@endsection
