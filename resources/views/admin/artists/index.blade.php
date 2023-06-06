@extends('layouts.admin')



@section('content')
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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artists as $artist)
                <tr class="">
                    <td scope="row">{{$artist->id}}</td>
                    <td scope="row">{{$artist->name}}</td>
                    <td scope="row">
                        <img src="{{$artist->id}}" alt="{{$artist->name}}">
                    </td>
                    <td scope="row">{{$artist->genre}}</td>
                    <td scope="row">
                        <a href="{{route('artists.show', $artist->id)}}">View</a>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
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