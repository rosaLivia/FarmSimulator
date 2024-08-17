<?php

namespace App\Http\Controllers; #Define o escopo das variáveis desse código

#Import de classes que serão usadas ao longo do código
use App\Http\Controllers\Controller; #Importa as configurações do controller
use Illuminate\Http\Request; #Importa o mecânismo de consulta no banco de dados.
use Illuminate\Support\Facades\Hash; #Importa o mecânismo de hash.
use Illuminate\Validation\ValidationException; #Importa mecânismo de erro de validação.
use App\Models\User;
use App\Models\Employees;

#Criação de classe
class AuthController extends Controller{

	#Criação de função de validação de login
	public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['As credenciais fornecidas estão incorretas.']
        ]);
    }

    // Verifique o tipo de usuário e gere o token com as permissões adequadas
    if ($user instanceof \App\Models\User) {
        $token = $user->createToken('user-token', ['user'])->plainTextToken;
    } elseif ($user instanceof \App\Models\Employees) {
        if ($user->admin) {
            $token = $user->createToken('admin-token', ['admin'])->plainTextToken;
        } else {
            $token = $user->createToken('employeer-token', ['employeer'])->plainTextToken;
        }
    }

    return response()->json(['token' => $token]);
}

	
	#Criação de função de logout
	public function logout(Request $request) {
		$request->user()->currentAccessToken()->delete();
		return response()->json(['message' => 'Deslogado com sucesso']);
	}	
}