<?php

/*
Descrição:
Esse arquivo tem por finalidade criar rotas para api's, ou seja, webapps com front e back separados.
*/

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentmethodController;
use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', function () {
    return response()->json(['message' => 'Hello, World!'], 200);
});

/*
Cliente:
login
Funcionário:

Administrador:

*/


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

#Users
Route::middleware(['auth:sanctum','can:employeer'])->get('/users',[UserController::class, 'index']);
Route::middleware(['auth:sanctum','can:employeer'])->get('/users/{id}',[UserController::class, 'show']);
Route::middleware(['auth:sanctum','can:user'])->post('/users',[UserController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/users/{id}',[UserController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/users/{id}',[UserController::class, 'destroy']);

#Products
Route::middleware(['auth:sanctum','can:user'])->get('/products',[ProductController::class, 'index']);
Route::middleware(['auth:sanctum','can:user'])->get('/products/{id}',[ProductController::class, 'show']);
Route::middleware(['auth:sanctum','can:employeer'])->post('/products',[ProductController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/products/{id}',[ProductController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/products/{id}',[ProductController::class, 'destroy']);

#Suppliers
Route::middleware(['auth:sanctum','can:employeer'])->get('/suppliers',[SuppliersController::class, 'index']);
Route::middleware(['auth:sanctum','can:employeer'])->get('/suppliers/{id}',[SuppliersController::class, 'show']);
Route::middleware(['auth:sanctum','can:employeer'])->post('/suppliers',[SuppliersController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/suppliers/{id}',[SuppliersController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/suppliers/{id}',[SuppliersController::class, 'destroy']);

#Recipes
Route::middleware(['auth:sanctum','can:employeer'])->get('/recipes',[RecipeController::class, 'index']);
Route::middleware(['auth:sanctum','can:employeer'])->get('/recipes/{id}',[RecipeController::class, 'show']);
Route::middleware(['auth:sanctum','can:user'])->post('/recipes',[RecipeController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/recipes/{id}',[RecipeController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/recipes/{id}',[RecipeController::class, 'destroy']);

#Paymentmethods
Route::middleware(['auth:sanctum','can:user'])->get('/paymentmethods',[PaymentmethodController::class, 'index']);
Route::middleware(['auth:sanctum','can:user'])->get('/paymentmethods/{id}',[PaymentmethodController::class, 'show']);
Route::middleware(['auth:sanctum','can:employeer'])->post('/paymentmethods',[PaymentmethodController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/paymentmethods/{id}',[PaymentmethodController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/paymentmethods/{id}',[PaymentmethodController::class, 'destroy']);

#Orders
Route::middleware(['auth:sanctum','can:employeer'])->get('/orders',[OrderController::class, 'index']);
Route::middleware(['auth:sanctum','can:employeer'])->get('/orders/{id}',[OrderController::class, 'show']);
Route::middleware(['auth:sanctum','can:user'])->post('/orders',[OrderController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/orders/{id}',[OrderController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/orders/{id}',[OrderController::class, 'destroy']);

#Employeers
Route::middleware(['auth:sanctum','can:admin'])->get('/employees',[EmployeesController::class, 'index']);
Route::middleware(['auth:sanctum','can:admin'])->get('/employeers/{id}',[EmployeesController::class, 'show']);
Route::middleware(['auth:sanctum','can:admin'])->post('/employeers',[EmployeesController::class, 'store']);
Route::middleware(['auth:sanctum','can:admin'])->put('/employeers/{id}',[EmployeesController::class, 'update']);
Route::middleware(['auth:sanctum','can:admin'])->delete('/employeers/{id}',[EmployeesController::class, 'destroy']);

#Deliveries
Route::middleware(['auth:sanctum','can:employeer'])->get('/deliveries',[DeliveriesController::class, 'index']);
Route::middleware(['auth:sanctum','can:employeer'])->get('/deliveries/{id}',[DeliveriesController::class, 'show']);
Route::middleware(['auth:sanctum','can:user'])->post('/deliveries',[DeliveriesController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/deliveries/{id}',[DeliveriesController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/deliveries/{id}',[DeliveriesController::class, 'destroy']);

#Chart
Route::middleware(['auth:sanctum','can:employeer'])->get('/charts',[CartController::class, 'index']);
Route::middleware(['auth:sanctum','can:employeer'])->get('/charts/{id}',[CartController::class, 'show']);
Route::middleware(['auth:sanctum','can:user'])->post('/charts',[CartController::class, 'store']);
Route::middleware(['auth:sanctum','can:employeer'])->put('/charts/{id}',[CartController::class, 'update']);
Route::middleware(['auth:sanctum','can:employeer'])->delete('/charts/{id}',[CartController::class, 'destroy']);

