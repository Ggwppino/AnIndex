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
        return new AnimeResource($anime->load(['episodes', 'targets', 'categories', 'fansubs', 'users']));
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
        $data = Anime::find($anime_id);
        return view('single_anime.anime', ['anime' => $data]);
    }

    public function getAnime(int $anime_id)
    {
        return Anime::find($anime_id);
    }

    public function getCategories(int $anime_id)
    {
        return AnimeAPIController::getAnime($anime_id)->categories;
    }

    public function getTarget(int $anime_id)
    {
        return AnimeAPIController::getAnime($anime_id)->targets;
    }

    public function getRelations(int $anime_id)
    {
        $anime_father_id = AnimeAPIController::getAnime($anime_id)->father;
        return DB::table('animes')->where('father', $anime_id)->orWhere('id', $anime_father_id)->select('id','name', 'img', 'sequel')->get();
    }

    public function getFansubs(int $anime_id){
        return AnimeAPIController::getAnime($anime_id)->fansubs;
    }

    public function getEpisodes(int $anime_id){
        return AnimeAPIController::getAnime($anime_id)->episodes;
    }


}
