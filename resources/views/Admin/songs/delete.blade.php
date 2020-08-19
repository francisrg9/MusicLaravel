@extends('layouts.app')

@section('content')
@if (Route::has('login'))
        @auth
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/songs/delete" method="POST">
                    @csrf
                    @method('DELETE')
                <input type="hidden" name="songid" id="songid" value="{{ $song->_id}}">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $song->title }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="artist">Artist</label>
                        <input class="form-control" type="text" name="artist" id="artist" value="{{ $song->artist }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input class="form-control" type="text" name="genre" id="genre" value="{{ $song->genre }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="album">Album</label>
                        <input class="form-control" type="text" name="album" id="album" value="{{ $song->album }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control" type="text" name="year" id="year" value="{{ $song->year }}" disabled>
                    </div>
                    <a href="/admin/songs" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
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
                    
