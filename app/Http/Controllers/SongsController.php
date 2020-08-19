<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use MongoDB;
use Illuminate\Http\Request;

class SongsController extends Controller {

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function Index (){
        $collections= (new MongoDB\Client)->Music->Songs;
        $songs = $collections->find();
        
        return view('Songs.index', ['songs' => $songs]);

    }
    public function IndexAdmin (){
        $collections= (new MongoDB\Client)->Music->Songs;
        $song = $collections->find();
        return view('Admin.songs.index', ['song' => $song]);

    }
    public function Show($id){

        $collection = (new MongoDB\Client)->Music->Songs;

        $song = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        return view('Admin.songs.details', [ "song" => $song]);

    }

    
public function Create(){

        $collectionalbum = (new MongoDB\Client)->Music->Albums;
        $album = $collectionalbum->find();
        $collectionartist = (new MongoDB\Client)->Music->Artists;
        $artist = $collectionartist->find();
        $collectiongenre = (new MongoDB\Client)->Music->Genres;
        $genre = $collectiongenre->find();
        return view('Admin.songs.create', ["album" => $album, "artist" => $artist, "genre" => $genre]);

    }
    
public function Song(){

        $song = [

            "title" => request("title"),

            "artist" => request("artist"),

            "genre" => request("genre"),

            "album" => request("album"),

            "year" => request("year")
        ];
        $collection = (new MongoDB\Client)->Music->Songs;
        $insertOneResult = $collection->insertOne($song);
        return redirect("/admin/songs");

    }

    
public function Edit($id){

        $collection = (new MongoDB\Client)->Music->Songs;
        $song = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        $collectionalbum = (new MongoDB\Client)->Music->Albums;
        $album = $collectionalbum->find();
        $collectionartist = (new MongoDB\Client)->Music->Artists;
        $artist = $collectionartist->find();
        $collectiongenre = (new MongoDB\Client)->Music->Genres;
        $genre = $collectiongenre->find();
        return view('Admin.songs.edit', [ "song" => $song, "album" => $album, "artist" => $artist, "genre" => $genre ]);

    }
    public function Update(){
        $collection = (new MongoDB\Client)->Music->Songs;

        $song = [

            "title" => request("title"),

            "artist" => request("artist"),

            "genre" => request("genre"),

            "album" => request("album"),

            "year" => request("year")
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("songid"))
        ], [
            '$set' => $song
        ]);
        return redirect('/admin/songs/'.request("songid"));
    }

    
    public function Delete($id){

        $collection = (new MongoDB\Client)->Music->Songs;
        $song = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
        $collectionalbum = (new MongoDB\Client)->Music->Albums;
        $album = $collectionalbum->find();
        $collectionartist = (new MongoDB\Client)->Music->Artists;
        $artist = $collectionartist->find();
        $collectiongenre = (new MongoDB\Client)->Music->Genres;
        $genre = $collectiongenre->find();

      return view('Admin.songs.delete', [ "song" => $song, "album" => $album, "artist" => $artist, "genre" => $genre  ]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->Music->Songs;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request('songid'))
        ]);
        return redirect('/admin/songs');
    }
}