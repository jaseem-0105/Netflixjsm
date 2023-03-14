<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function viewMovie()
    {
        $genres = Genre::get();
        $movies = Movie::get();
        return view('movies.viewMovies', compact('movies', 'genres'));
    }


    public function addMovie(Request $request)
    {
        $movie = new Movie();
        $movie->name = $request->name;
        $movie->description = $request->description;
        if (file($request->image)) {
            $file = $request->image;
            $imagename = time() . $file->getClientOriginalName();
            $file->move(public_path('/movies/'), $imagename);
            $movie->image = "/movies/" . $imagename;
        }
        $movie->save();
        $movie->genre()->sync($request->genre_id);
        return redirect()->back();
    }
    public function toggleMovie($id)
    {
        $movie = Movie::find($id);
        $movie->is_active = !$movie->is_active;
        $movie->save();
        return redirect()->back();
    }
    public function viewEditMovie($id)
    {
        $genres = Genre::all();
        $movie = Movie::where('id', $id)->first();
        $genreIds = $movie->genre()->pluck('genre_id')->toArray();
        return view('movies.editmovies', compact('movie', 'genres', 'genreIds'));
    }
    public function editMovie(Request $request)
    {
        $movie = Movie::find($request->id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        if ($request->image) {
            if ($movie->image) {
                @unlink(public_path($movie->image));
                $file = $request->image;
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/movies/'), $imagename);
                $movie->image = "/movies/" . $imagename;
            } else {
                $file = $request->image;
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/movies/'), $imagename);
                $movie->image = "/movies/" . $imagename;
            }
        }
        $movie->genre()->sync($request->genre_id);
        $movie->save();
        return redirect()->back();
    }
    public function deleteMovie($id)
    {
        Movie::where('id', $id)->delete();
        return redirect()->back();
    }
}
