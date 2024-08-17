<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;
class EmployeesController extends Controller
{
    public function index()
    {
        return Employees::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'sometimes|required|numeric',
            'email' => '',
            'password' => '',
            'adm' => ''
        ]);

        return Employees::create($request->all());
    }

    public function show($id)
    {
        return Employees::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Employees::find($id);

        $request->validate([
            'name' => 'sometimes|required|numeric',
            'email' => '',
            'password' => '',
            'adm' => ''
        ]);

        $product->update($request->all());

        return $product;
    }

    public function destroy($id)
    {
        return Employees::destroy($id);
    }
}
