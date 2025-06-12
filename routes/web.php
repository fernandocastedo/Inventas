<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Ruta para la landing page
Route::get('/', function () {
    return view('landing_page'); // Asegúrate de que la vista sea 'landing_page.blade.php'
});

// Ruta para el formulario de registro (POST)
Route::post('/register', [UserController::class, 'register'])->name('register.user');
