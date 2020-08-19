@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Songs</h1>
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
                        @foreach($songs as $songs)
                        <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $songs->title }}</td>
                        <td>{{ $songs->artist }}</td>
                        <td>{{ $songs->genre }}</td>
                        <td>{{ $songs->album }}</td>
                        <td>{{ $songs->year }}</td>
                        <td>                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection