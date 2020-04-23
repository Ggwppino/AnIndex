<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Http\Resources\AnimeCollection;
use App\Http\Resources\AnimeResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AnimeAPIController extends Controller
{
    public function index()
    {
        return new AnimeCollection(Anime::paginate());
    }

    public function show(Anime $anime)
    {
        return new AnimeResource($anime->load(['targets', 'categories']));
    }

    public function store(Request $request)
    {
        return new AnimeResource(Anime::create($request->all()));
    }

    public function update(Request $request, Anime $anime)
    {
        $anime->update($request->all());

        return new AnimeResource($anime);
    }

    public function destroy(Request $request, Anime $anime)
    {
        $anime->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }




    public function getAnimeView(int $anime_id)
    {
        $data = json_encode($this->show(Anime::find($anime_id)->load(['fansubs', 'episodes', 'users'])));
        return view('single_anime.anime')->with('anime', $data);

    }

    public function getAnime(int $anime_id)
    {
        return json_encode($this->show(Anime::find($anime_id)));
    }


    public static function getRelations(int $anime_id)
    {
        $anime_father_id = Anime::find($anime_id)->father;
        return DB::table('animes')->where('father', $anime_id)->orWhere('id', $anime_father_id)->select('id','name', 'img', 'sequel')->get();
    }

}
