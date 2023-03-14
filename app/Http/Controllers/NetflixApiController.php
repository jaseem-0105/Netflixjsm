<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class NetflixApiController extends Controller
{
    public function getAllGen(Request $request)
    {
        $geners = Genre::where('is_active', 1)
            ->whereHas('movies', function ($q) {
                $q->where('is_active', 1);
            })
            ->with(['movies' => function ($query) {
                $query->where('is_active', 1);
            }])
            ->get();


        if ($geners->count() > 0) {
            $response = ["success" => true, "data" => $geners];
        } else {
            $response = ["success" => true, "data" => 'No Data Available'];
        }


        return response()->json($response);
    }
    public function getAllMovies(Request $request)
    {
        $movies = Movie::where('is_active', 1)->get();
        if ($movies->count() > 0) {
            $response = ["success" => true, "data" => $movies];
        } else {
            $response = ["success" => true, "data" => 'No Data Available'];
        }
        $response = ["success" => true, "data" => $movies];
        return response()->json($response);
    }



    public function getMovieName(Request $request)
    {
        $movies = Movie::where('name', $request->name)->where("is_active", 1)->get();
        $response = ["success" => true, "data" => $movies];
        return response()->json($response);
    }
    public function sameGenreId(request $request)
    {
        $geners = Genre::where('id', $request->id)->first();
        $movieIds = $geners->movies()->pluck('movie_id')->toArray();
        $movies = Movie::whereIn('id', $movieIds)->get();
        $response = ["success" => true, "data" => $movies];

        return response()->json($response);
    }
}
