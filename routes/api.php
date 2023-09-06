<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::resource('product/add', ProductController::class)->middleware('auth');
Route::get("/products", [ProductController::class, "getAll"]);
Route::get("/products/{id}/all", [ProductController::class, "getAllByCategory"]);
Route::get("/products/{id}", [ProductController::class, "getById"]);
Route::get("/order/{id}", [OrderController::class, "getOrderWithProducts"]);

Route::get("/categories/sub/all", [SubCategoryController::class, "getAll"]);
Route::get("/categories/all", [CategoryController::class, "getAll"]);
Route::get("/manufacturers/{id}", [ManufacturerController::class, "getAllByCategory"]);
Route::get("/manufacturers", [ManufacturerController::class, "getAll"]);

Route::post("/products/all", [ProductController::class, "getAllF"]);
Route::post("/manufacturers/all", [ManufacturerController::class, "getAllByProducts"]);
Route::post("/products/create", [ProductController::class, "createProduct"]);
Route::post("/order/create", [OrderController::class, "create"]);


