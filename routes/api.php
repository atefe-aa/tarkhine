<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TicketsController;
use Illuminate\Http\Request;
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

Route::apiResource('branches', BranchesController::class);

Route::apiResource('slider', SliderController::class);

Route::apiResource('tickets', TicketsController::class);

Route::apiResource('food', FoodsController::class);

Route::get('menu/{branchId}', [FoodsController::class, 'menu']);

Route::get('menu/popular/{branchId}', [FoodsController::class, 'popularMenu']);

Route::get('menu/recommended/{branchId}', [FoodsController::class, 'recommendedMenu']);

Route::post('menu/{branchId}', [FoodsController::class, 'foodsByCategory']);

Route::get('main-categories', [CategoriesController::class, 'showMainCategories' ]);

Route::post('search', [SearchController::class ,'search']);

Route::get('emptycart/{customerId}', [CartController::class,'empty']);

Route::apiResource('cart/{customerId}', CartController::class);

// Route::apiResource('addresses/{customerId}', AddressesController::class);
//Route::get('addresses/{customerId}', [AddressesController::class,'index']);

Route::apiResource('order', OrdersController::class);
