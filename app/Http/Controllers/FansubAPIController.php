<?php

namespace App\Http\Controllers;

use App\Fansub;
use App\Http\Resources\FansubCollection;
use App\Http\Resources\FansubResource;
use Illuminate\Support\Facades\DB;

class FansubAPIController extends Controller
{
    public function index()
    {
        return new FansubCollection(Fansub::paginate());
    }
 
    public function show(Fansub $fansub)
    {
        return new FansubResource($fansub->load(['fansubbers', 'anime', 'episodes']));
    }

    public function store(Request $request)
    {
        return new FansubResource(Fansub::create($request->all()));
    }

    public function update(Request $request, Fansub $fansub)
    {
        $fansub->update($request->all());

        return new FansubResource($fansub);
    }

    public function destroy(Request $request, Fansub $fansub)
    {
        $fansub->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }

    public function getFansub(int $fansub_id)
    {
        return Fansub::find($fansub_id);
    }

    public function getFansubView(int $fansub_id)
    {
        $data = Fansub::find($fansub_id);
        return view('profile.fansub', ['fansub' => $data]);
    }

    public function getAnimes(int $fansub_id){
        $collections= FansubAPIController::getFansub($fansub_id)->animes;
        for($i= 0; $i<$collections->count();$i++){
            $animes[$i]= ['id' => $collections[$i]->id,'name' => $collections[$i]->name];
        }
        return $animes;
    }

    public function getLastWorks(int $fansub_id){
        return DB::table('episode_fansub')
            ->where('fansub_id', '=', $fansub_id)
            ->orderByDesc('episode_fansub.created_at')
            ->limit(4)
            ->join('episodes', 'episodes.id', '=', 'episode_fansub.episode_id')
            ->join('animes', 'animes.id','=','anime_id')
            ->select('name', 'number', 'anime_id', 'episode_fansub.link')
            ->get();
    }
}
