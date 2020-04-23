<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Http\Resources\EpisodeCollection;
use App\Http\Resources\EpisodeResource;
use Illuminate\Support\Facades\DB;

class EpisodeAPIController extends Controller
{
    public function index()
    {
        return new EpisodeCollection(Episode::paginate());
    }

    public function show(Episode $episode)
    {
        return new EpisodeResource($episode->load(['anime', 'fansubs', 'users']));
    }

    public function store(Request $request)
    {
        return new EpisodeResource(Episode::create($request->all()));
    }

    public function update(Request $request, Episode $episode)
    {
        $episode->update($request->all());

        return new EpisodeResource($episode);
    }

    public function destroy(Request $request, Episode $episode)
    {
        $episode->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }

    public function getList()
    {
        return DB::table('episodes')
            ->limit(42)
            ->join('animes', 'episodes.anime_id', '=', 'animes.id')
            ->orderBy('episodes.created_at', 'desc')
            ->select('number', 'anime_id', 'img', 'name')
            ->get();

    }

    public function getEpisodeView(int $anime_id, string $name, int $number_ep)
    {
        return $data = json_encode(
            $this->show(
                Episode::where('anime_id', $anime_id)
                    ->where('number', $number_ep)
                    ->first()));
        //return view('single_anime.episode')->with('episode', $data);
    }


}
