<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/login', [LoginController::class,'show'])->name('login.show');
Route::post('/login', [LoginController::class,'login'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Order route
Route::get('/orders', [DashboardController::class, 'orders'])->name('orders.index');

Route::get('/products-by-category/{category}', [CategoryController::class, 'getProductByCategory'])->name('products.filter.by.category');
