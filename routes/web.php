<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PlanController;

// Ruta para la landing page
Route::get('/', function () {
    return view('landing_page'); // Asegúrate de que la vista sea 'landing_page.blade.php'
});

// Ruta para el formulario de registro (POST)
Route::post('/register', [UserController::class, 'register'])->name('register.user');

// Rutas de autenticación
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Ruta protegida para el dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');

// Rutas CRUD de ventas (Order)
Route::resource('orders', OrderController::class)->middleware('auth');

// Rutas CRUD de productos
Route::resource('products', ProductController::class);

// Rutas CRUD de usuarios
Route::resource('users', UserController::class);

Route::get('/planes/inicial', [PlanController::class, 'inicial'])->name('planes.inicial');
Route::get('/planes/avanzado', [PlanController::class, 'avanzado'])->name('planes.avanzado');
Route::get('/planes/premium', [PlanController::class, 'premium'])->name('planes.premium');

Route::post('/planes/avanzado', [PlanController::class, 'postAvanzado'])->name('planes.avanzado.post');
Route::post('/planes/premium/demo', [PlanController::class, 'postPremiumDemo'])->name('planes.premium.demo');
Route::post('/planes/premium/contratar', [PlanController::class, 'postPremiumContratar'])->name('planes.premium.contratar');
