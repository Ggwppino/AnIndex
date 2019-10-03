<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
 
class CategoryAPIController extends Controller
{
    public function index()
    {
        return new CategoryCollection(Category::paginate());
    }
 
    public function show(Category $category)
    {
        return new CategoryResource($category->load(['anime']));
    }

    public function store(Request $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
