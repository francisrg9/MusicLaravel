@extends('layouts.app')

@section('content')
@if (Route::has('login'))
        @auth
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Songs</h1>
                <a class="text right" href="/admin/songs/create">New</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Song</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Album</th>
                        <th scope="col">Year</th>
                        <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($song as $song)
                        <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->artist }}</td>
                        <td>{{ $song->genre }}</td>
                        <td>{{ $song->album }}</td>
                        <td>{{ $song->year }}</td>
                        <td>
                            <a href="/admin/songs/{{ $song->_id }}">Details</a> |
                            <a href="/admin/songs/edit/{{ $song->_id }}">Edit</a> |
                            <a href="/admin/songs/delete/{{ $song->_id }}">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="container">
    <h1>You need permission to enter:</h1>
    <a href="/login" class="btn btn-primary">Log in</a>
    </div>
    @endauth
    @endif
@endsection