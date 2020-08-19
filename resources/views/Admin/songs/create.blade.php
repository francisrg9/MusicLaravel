@extends('layouts.app')

@section('content')
@if (Route::has('login'))
        @auth
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/songs/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="title">Song Name</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="artist">Artist</label>
                        <input class="form-control" type="text" name="artist" id="title_song">
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select name="genre" id="genre" class="form-control">
                            <option value="0">Select a Genre... </option>
                            @foreach($genre as $genre)
                            <option value="{{ $genre->genre}}">{{ $genre->genre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="album">Album</label>
                        <input class="form-control" type="text" name="album" id="title_song">
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control" type="text" name="year" id="year">
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
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
