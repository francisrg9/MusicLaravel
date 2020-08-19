@extends('layouts.app')

@section('content')
@if (Route::has('login'))
        @auth
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Details</h1>
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $genre->genre}}</h5>
                    </div>
                    <ul class="list-group list-group-flash">
                     
                    </ul>
                        <div class="card-body">
                        <a href="/admin/genres/edit/{{ $genre->_id }}" class="card-link">Edit</a>
                        <a href="/admin/genres/delete/{{ $genre->_id }}" class="card-link">Delete</a>
                        </div>
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
