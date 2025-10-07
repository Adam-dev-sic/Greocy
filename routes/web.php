<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);;

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/existing_user', [UserController::class, 'logUser']);

Route::post('/cart/add', [MainController::class, 'addToCart']);

Route::get('/checkout', [MainController::class, 'checkout']);

Route::delete('/products/{id}', [MainController::class, 'deleteProduct'])->name('products.destroy');

Route::delete('/cart/item/{id}', [MainController::class, 'deleteItem'])->name('item.destroy');

Route::get('/search', [MainController::class, 'search'])->name('products.search');

Route::post('/cart/edit', [MainController::class, 'editItem'])->name('cart.edit');

Route::get('products/add', [MainController::class, 'addItemPage']);

Route::get('products/edit/{id}', [MainController::class, 'editItemPage'])->name('products.edit');

Route::post('products/additem', [MainController::class, 'addNewItem'])->name('products.add');

Route::post('products/update', [MainController::class, 'updateProduct'])->name('products.update');

Route::get('/profile', [UserController::class, 'getProfile']);

Route::post('/profile/update', [UserController::class, 'updateProfile']);
