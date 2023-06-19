@extends('layouts.app')

@section('content')
    <h1 class="text-center py-4">Artists:</h1>

    <div class="container">
        <div class="my-2 text-center">
            <a class="btn btn-dark" href="{{ route('artists.create') }}" role="button">Create new artist</a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @forelse ($artists as $artist)
                <div class="col">

                    <div class="card artist">
                        <a class="text-black" href="{{ route('artists.show', $artist->id) }}">
                            <img class="card-img-top" src="{{ $artist->image }}" alt="Title">
                            <div class="card-body">
                                <h4 class="card-title">{{ $artist->name }}</h4>
                                <ul>
                                    <li>
                                        {{ $artist->genre }}
                                    </li>
                                    <li>
                                        Birthdate: {{ $artist->birth_date }}
                                    </li>
                                    <li>
                                        Death date: {{ $artist->death_date }}
                                    </li>
                                    <li class="list-unstyled mt-2">
                                        <a class="btn btn-dark" href="{{ route('artists.edit', $artist->id) }}"
                                            role="button">Edit</a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>

                </div>
            @empty
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        <strong>No artists</strong> Try later!!
                    </div>

                </div>
            @endforelse
        </div>
    </div>
@endsection
