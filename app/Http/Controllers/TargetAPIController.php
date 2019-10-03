<?php

namespace App\Http\Controllers;

use App\Target;
use App\Http\Resources\TargetCollection;
use App\Http\Resources\TargetResource;
 
class TargetAPIController extends Controller
{
    public function index()
    {
        return new TargetCollection(Target::paginate());
    }
 
    public function show(Target $target)
    {
        return new TargetResource($target->load(['anime']));
    }

    public function store(Request $request)
    {
        return new TargetResource(Target::create($request->all()));
    }

    public function update(Request $request, Target $target)
    {
        $target->update($request->all());

        return new TargetResource($target);
    }

    public function destroy(Request $request, Target $target)
    {
        $target->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
