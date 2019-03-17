<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Genre;
use App\Season;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    //
    public function createAnime(Request $request){
        $anime = new Anime;
        $anime->name = $request->name;
        $anime->img = $request->img;
        $anime->plot = $request->plot;
        $anime->save();
        $genre = Genre::find($request->genres);
        $anime->genres()->attach($genre);
        return 'success';
    }

    public function createSeason(Request $request){
        if(Season::where('anime_id',$request->anime)->where('name',$request->name)->first()) return 'false';
        $anime = Anime::find($request->anime);
        $anime->createSeason($request->name);
        return 'success';
    }

    public function createEpisode(Request $request){
        if(Episode::join())
    }
}
