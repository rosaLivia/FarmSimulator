<?php

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
use App\Models\User;

Route::get('/', function () {
    return response()->json(['message' => 'Hello, World!'], 200);
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products{id}', [ProductController::class, 'destroy']);

Route::get('/suppliers', [SuppliersController::class, 'index']);
Route::get('/suppliers/{id}', [SuppliersController::class, 'show']);
Route::post('/suppliers', [SuppliersController::class, 'store']);
Route::put('/suppliers/{id}', [SuppliersController::class, 'update']);
Route::delete('/suppliers{id}', [SuppliersController::class, 'destroy']);

#Rota Recipes
Route::get('/recipe', [RecipeController::class, 'index']);
Route::get('/recipe/{id}', [RecipeController::class, 'show']);
Route::post('/recipe', [RecipeController::class, 'store']);
Route::put('/recipe/{id}', [RecipeController::class, 'update']);
Route::delete('/recipe{id}', [RecipeController::class, 'destroy']);

#Rota paymentmethod
Route::get('/paymentmethod', [PaymentmethodController::class, 'index']);
Route::get('/paymentmethod/{id}', [PaymentmethodController::class, 'show']);
Route::post('/paymentmethod', [PaymentmethodController::class, 'store']);
Route::put('/paymentmethod/{id}', [PaymentmethodController::class, 'update']);
Route::delete('/paymentmethod{id}', [PaymentmethodController::class, 'destroy']);

#Rota Order
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/order/{id}', [OrderController::class, 'update']);
Route::delete('/order{id}', [OrderController::class, 'destroy']);

#Rota Employeers
Route::get('/employeers', [EmployeesController::class, 'index']);
Route::get('/employeers/{id}', [EmployeesController::class, 'show']);
Route::post('/employeers', [EmployeesController::class, 'store']);
Route::put('/employeers/{id}', [EmployeesController::class, 'update']);
Route::delete('/employeers{id}', [EmployeesController::class, 'destroy']);

#Rotas Deliveries
Route::get('/deliveries', [DeliveriesController::class, 'index']);
Route::get('/deliveries/{id}', [DeliveriesController::class, 'show']);
Route::post('/deliveries', [DeliveriesController::class, 'store']);
Route::put('/deliveries/{id}', [DeliveriesController::class, 'update']);
Route::delete('/deliveries{id}', [DeliveriesController::class, 'destroy']);

#Rota Cart
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/{id}', [CartController::class, 'show']);
Route::post('/cart', [CartController::class, 'store']);
Route::put('/cart/{id}', [CartController::class, 'update']);
Route::delete('/cart{id}', [CartController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'login']);
