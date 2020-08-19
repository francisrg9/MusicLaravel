@extends('layouts.app')

@section('content')
@if (Route::has('login'))
        @auth
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <ul class="list-group list-group-flash">
                    <li class= "list-group-item" ><b>Name:</b>  {{ $song->title}}</li> 
                    <li class= "list-group-item" ><b>Artist:</b>  {{ $song->artist}}</li>    
                     <li class= "list-group-item" ><b>Genre:</b>  {{ $song->genre}}</li> 
                     <li class= "list-group-item"><b>Album:</b>  {{ $song->album}}</li> 
                     <li class= "list-group-item"><b>Year:</b>  {{ $song->year}}</li> 
                    </ul>
                        <div class="card-body">
                        <a href="/admin/songs/edit/{{ $song->_id }}" class="card-link">Edit</a>
                        <a href="/admin/songs/delete/{{ $song->_id }}" class="card-link">Delete</a>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" name="comment" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Post comment</button>
                </div>
                
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
