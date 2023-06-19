@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <img src="{{ $artist->image }}" alt="">
            </div>
            <div class="col">
                <div class="card h-100 p-2">
                    <h1 class="text-center">{{ $artist->name }}</h1>
                    <p>Genre: <span>{{ $artist->genre }}</span></p>
                    <p>Birth of Date: <span>{{ $artist->birth_date }}</span></p>
                    <p>Death date: <span>{{ $artist->death_date }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
