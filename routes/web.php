<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;



// Authentication Routes
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Email Verification Routes
Route::get('/email/verify', [AuthController::class, 'verificationNotice'])->name('verification.notice');
Route::get('/email/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verification.verify');

// Password Reset Routes
Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/password/reset/{token}/{email}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Profile Routes
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::put('/password', [AuthController::class, 'updatePassword'])->name('password.change');

//my routes 

// Route::get('/', [HomeController::class,'index'])->name('index');
// Route::get('/login', [LoginController::class,'show'])->name('login.show');
// Route::post('/login', [LoginController::class,'login'])->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('welcome');

// Order route
Route::get('/orders', [DashboardController::class, 'orders'])->name('orders.index');

// Customer routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::get('/customers/{customer}/delete', [CustomerController::class, 'delete'])->name('customers.delete');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
// Customer search API route
Route::get('/api/customers/search', [CustomerController::class, 'search'])->name('customers.search');


Route::get('/products-by-category/{category}', [CategoryController::class, 'getProductByCategory'])->name('products.filter.by.category');


