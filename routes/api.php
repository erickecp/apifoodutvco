<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para generar un producto
Route::post('newFood', [FoodController::class, 'postFood']);
Route::put('editfood/{id}', [FoodController::class, 'putFood']);
Route::delete('food/{id}', [FoodController::class, 'deleteFood']);
Route::get('foods', [FoodController::class, 'getFoods']);
Route::get('food/{id}', [FoodController::class, 'getFood']);
//&Ordenes
Route::post('newOrder', [OrderController::class, 'postOrder']);

Route::post('auth',[AuthController::class, 'login']);
Route::post('newUser', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);


Route::get('categories', [CategoryController::class, 'getCategories']);
Route::post('category', [CategoryController::class, 'postCategory']);
Route::get('search', [FoodController::class, 'searchFood']);
