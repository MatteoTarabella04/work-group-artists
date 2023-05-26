@extends('layouts.app')

@section('content')
    <h1 class="text-center py-4">Artists:</h1>

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @forelse ($artists as $artist)
                <div class="col">
                    <div class="card">
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
                            </ul>
                        </div>
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
