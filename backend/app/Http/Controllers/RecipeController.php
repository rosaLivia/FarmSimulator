<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return Recipe::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        return Recipe::create($request->all());
    }

    public function show($id)
    {
        return Recipe::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Recipe::find($id);

        $request->validate([
            'name' => 'sometimes|required',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        return Recipe::destroy($id);
    }
}
