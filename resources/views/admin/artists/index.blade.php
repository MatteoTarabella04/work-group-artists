@extends('layouts.admin')



@section('content')
    @if (session('message'))
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Message</h4>
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class="container">
        <h1 class="text-center py-3">Admin</h1>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Album N°</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($artists as $artist)
                        <tr class="">
                            <td scope="row">{{ $artist->id }}</td>
                            <td scope="row">
                                <img height="70" src="{{ $artist->image }}" alt="{{ $artist->name }}">
                            </td>
                            <td scope="row">{{ $artist->name }}</td>
                            <td scope="row">{{ $artist->genre }}</td>
                            <td scope="row">{{ $artist->albums->count() }}</td>
                            <td scope="row">
                                <div class="d-flex gap-3">
                                    <a href="{{ route('artists.show', $artist->id) }}">
                                        <button class="btn btn-outline-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('artists.edit', $artist->id) }}">
                                        <button class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('artists.destroy', $artist->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-outline-danger" type="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row">No, Artists found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
