<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Paymentmethod;
class PaymentmethodController extends Controller
{
    public function index()
    {
        return Paymentmethod::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|varchar(20)',
        ]);

        return Paymentmethod::create($request->all());
    }

    public function show($id)
    {
        return Paymentmethod::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Paymentmethod::find($id);

        $request->validate([
            'name' => 'required|varchar(20)'
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        return Paymentmethod::destroy($id);
    }
}
