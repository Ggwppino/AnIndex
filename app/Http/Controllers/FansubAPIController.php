<?php

namespace App\Http\Controllers;

use App\Fansub;
use App\Http\Resources\FansubCollection;
use App\Http\Resources\FansubResource;
 
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
}
