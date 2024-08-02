<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Deliveries;
class DeliveriesController extends Controller
{
    public function index()
    {
        return Deliveries::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'arrived_date' => 'required|date',
            'tracking_code' => 'required|varchar(10)'
        ]);

        return Deliveries::create($request->all());
    }

    public function show($id)
    {
        return Deliveries::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Deliveries::find($id);

        $request->validate([
            'arrived_date' => 'required|date',
            'tracking_code' => 'required|varchar(10)'
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        return Deliveries::destroy($id);
    }
}
