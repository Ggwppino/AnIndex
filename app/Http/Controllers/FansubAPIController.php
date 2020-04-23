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
        return new FansubResource($fansub->load(['fansubbers', 'animes', 'episodes']));
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


    public function getFansubView(int $fansub_id)
    {
        $data = json_encode($this->show(Fansub::find($fansub_id)));
        return view('profile.fansub', ['fansub' => $data]);

    }

    public static function getAnimes(int $fansub_id){
        $collections= Fansub::find($fansub_id)->animes;
        for($i= 0; $i<$collections->count();$i++){
            $animes[$i]= ['id' => $collections[$i]->id,'name' => $collections[$i]->name];
        }
        return $animes;
    }

    public static function getLastWorks($fansub_id){
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
