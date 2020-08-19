@extends('layouts.app')

@section('content')
@if (Route::has('login'))
        @auth
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>New</h1>
                <form action="/admin/genres/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="genre">Name</label>
                        <input class="form-control" type="text" name="genre" id="genre">
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