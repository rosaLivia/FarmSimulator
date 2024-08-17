<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        return Order::create($request->all());
    }

    public function show($id)
    {
        return Order::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Order::find($id);

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
        return Order::destroy($id);
    }
}

