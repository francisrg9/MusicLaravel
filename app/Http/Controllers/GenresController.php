<?php

namespace App\Http\Controllers;
use MongoDB;
use Illuminate\Http\Request;

class GenresController extends Controller {

    public function Index (){
        $collections= (new MongoDB\Client)->Music->Genres;
        $genre = $collections->find();
        return view('Genres.index', ['genre' => $genre]);

    }

    public function IndexAdmin (){
        $collections= (new MongoDB\Client)->Music->Genres;
        $genre = $collections->find();
        return view('Admin.genres.index', ['genre' => $genre]);

    }

    public function Show($id){

        $collection = (new MongoDB\Client)->Music->Genres;

        $genre = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);

        return view('Admin.genres.details', [ "genre" => $genre ]);

    }

    public function Create(){

        $collection = (new MongoDB\Client)->Music->Genres;
        $genre = $collection->find();
        return view('Admin.genres.create', [ "genre" => $genre]);

    }

    public function Genre(){

        $genre = [

            "genre" => request("genre")

        ];
        $collection = (new MongoDB\Client)->Music->Genres;
        $insertOneResult = $collection->insertOne($genre);
        return redirect("/admin/genres");

    }

    public function Edit($id){
        $collection = (new MongoDB\Client)->Music->Genres;
        $genre = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        return view('Admin.genres.edit',["genre" => $genre]);
    }
    
    public function Update(){
        $collection = (new MongoDB\Client)->Music->Genres;
        $genre = [
            "genre" => request("genre")
        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("genreid"))
        ], [
            '$set' => $genre
        ]);
        return redirect('/admin/genres/'.request("genreid")); 
    }

    public function Delete($id){
        $collection = (new MongoDB\Client)->Music->Genres;
        $genre = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        return view("Admin.genres.delete", [ "genre"=> $genre ]);
    }
    public function Remove(){
        $collection = (new MongoDB\Client)->Music->Genres;
        $genre = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request('genreid'))
        ]);
        return redirect('/admin/genres');
    }
}