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
            <form action="{{ route('genres.store') }}" method="post">

                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name">
                    <small id="helpId" class="form-text text-muted">Required, max 100 charachters</small>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <div class="row gap-3">
            @forelse ($genres as $genre)
                <div class="card h-100" style="width:18rem;">
                    <div class="card-body d-flex gap-2 justify-content-between">
                        <form id="edit_form" action="{{ route('genres.update', $genre->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input id="genre_id" name="name" class="border-0 h-50 w-50" value="{{ $genre->name }}">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>

                        <div class="buttons">
                            {{-- <a class="btn btn-primary" href="genres/{{ $genre->id }}/edit" role="button">Edit</a> --}}
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $genre->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                        </td>
                        </tr>
                    </div>
                </div>
                {{-- Modal --}}
                <div class="modal fade" id="deleteModal-{{ $genre->id }}" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Delete Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this genre?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="post">
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
