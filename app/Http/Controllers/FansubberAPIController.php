<?php

namespace App\Http\Controllers;

use App\Fansubber;
use App\Http\Resources\FansubberCollection;
use App\Http\Resources\FansubberResource;
 
class FansubberAPIController extends Controller
{
    public function index()
    {
        return new FansubberCollection(Fansubber::paginate());
    }
 
    public function show(Fansubber $fansubber)
    {
        return new FansubberResource($fansubber->load(['fansub', 'user']));
    }

    public function store(Request $request)
    {
        return new FansubberResource(Fansubber::create($request->all()));
    }

    public function update(Request $request, Fansubber $fansubber)
    {
        $fansubber->update($request->all());

        return new FansubberResource($fansubber);
    }

    public function destroy(Request $request, Fansubber $fansubber)
    {
        $fansubber->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
