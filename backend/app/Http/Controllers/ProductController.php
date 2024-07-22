<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        return Product::create($request->all());
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

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
        return Product::destroy($id);
    }
}
