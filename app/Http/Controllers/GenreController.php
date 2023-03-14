<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function viewGenre(){
        $genres=Genre::get();
        return view('genre.viewGenre',compact('genres'));
    }
    public function toggleGenre($id){
        $genre = Genre::find($id);
        $genre->is_active = !$genre->is_active;
        $genre->save();
        return redirect()->back();
    }

   public function addGenre(Request $request)
   {
       $genre = new Genre();
       $genre->name = $request->name;
       $genre->save();
       return redirect()->back();
   }
   public function editGenre(Request $request,$id){
    $genre = Genre::where('id', $id)->first();
    $genre->name= $request->name;
    $genre->save();
    return redirect()->back();
}
public function deleteGenre($id){
    Genre::where('id', $id)->delete();
    return redirect()->back();
}
}
