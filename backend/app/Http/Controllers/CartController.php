<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
class CartController extends Controller
{
    public function index()
    {
        return Cart::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        return Cart::create($request->all());
    }

    public function show($id)
    {
        return Cart::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Cart::find($id);

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
        return Cart::destroy($id);
    }
}

