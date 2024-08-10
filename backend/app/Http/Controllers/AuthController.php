<?php

namespace App\Http\Controllers; #Define o escopo das variáveis desse código

#Import de classes que serão usadas ao longo do código
use App\Http\Controllers\Controller; #Importa as configurações do controller
use Illuminate\Http\Request; #Importa o mecânismo de consulta no banco de dados.
use Illuminate\Support\Facades\Hash; #Importa o mecânismo de hash.
use Illuminate\Validation\ValidationException; #Importa mecânismo de erro de validação.

#Criação de classe
class AuthController extends Controller{
	#Criação de função de validação de login
	public function login(Request $request){
		$request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);
		$user = \App\Models\User::where('email', $request->email)->first();
		
		if (!$user){
			throw ValidationException::withMessages([
				'email' => ['As credenciais fornecidas estão incorretas.']
			]);
		}
		if (!Hash::check($request->password, $user->password)){
			throw ValidationException::withMessages([
				'email' => ['As credenciais fornecidas estão incorretas.']
			]);
		}
		
		#Criação do token de permissão do usuário
		$token = $user->createToken('api-token')->plainTextToken; #Gera o token
		return response()->json([ #Retorna o token gerado em formato json
			'token' => $token
		]);
	}
	
	#Criação de função de logout
	public function logout(Request $request){
		
	}
}