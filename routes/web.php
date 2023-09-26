<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Show Register Screen
Route::get('/register', [UserController::class, 'register_screen'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Show Login Screen
Route::get('/login', [UserController::class, 'login_screen'])->middleware('guest');

// Log Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Show Create New Product Form
Route::get('/products/create', [ProductController::class, 'create_screen'] );


// All Products
Route::get('/', [ProductController::class, 'index']);

// Create New Product
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

// Show The Product Editing Screen
Route::get('/products/{product}/edit', [ProductController::class, 'edit_screen'])->middleware('auth');

// Update Product
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');

// Delete Product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth');

// Manage Products
Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth');

// Single Product
Route::get('/products/{product}', [ProductController::class, 'single_product']);
