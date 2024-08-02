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
            'product_code' => 'required|varchar(10)',
            'name' => 'required',
            'mark' => 'required',
            'description' => 'sometimes|varchar(100)',
            'price' => 'required|numeric',
            'instructions' => 'sometimes|varchar(100)',
            'stock' => 'required|integer'
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
            'product_code' => 'required|varchar(10)',
            'name' => 'required',
            'mark' => 'required',
            'description' => 'sometimes|varchar(100)',
            'price' => 'required|numeric',
            'instructions' => 'sometimes|varchar(100)',
            'stock' => 'required|integer'
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
