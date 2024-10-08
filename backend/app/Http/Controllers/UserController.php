<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return response()->json(User::all());
    }

    public function show($id) {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'cpf' => 'required|string',
                'phone' => 'string',
                'address' => 'string',
                'password' => 'required|string',
                'terms_accepted' => 'required|boolean'
            ]);

            $user = User::create($request->all());
            return response()->json($user, 201);
        } catch (\Exception $e) {
            if ($e->getCode() == 23505) {
                return response()->json(['message' => 'Usuário já existe', 'error' => 'user_already_exists'], 200);
            } else {
                return response()->json(['message' => 'Não foi possível criar a conta', 'error' => 'could_not_create'], 500);
            }
        }

    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
