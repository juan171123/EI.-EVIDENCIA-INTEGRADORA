<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
    return view('welcome');
});

//Autenticación
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

//Productos 
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [
        ProductController::class, 'home'
    ])->name('home');

    Route::get('/productos', [
        ProductController::class, 'index'
    ])->name('productos.index');

    Route::get('/productos/create', [
        ProductController::class, 'create'
    ])->name('productos.create');

    Route::post('/productos', [
        ProductController::class, 'store'
    ])->name('productos.store');

    Route::get('/productos/{producto}', [
        ProductController::class, 'show'
    ])->name('productos.show');

    Route::get('/productos/{producto}/edit', [
        ProductController::class, 'edit'
    ])->name('productos.edit');

    Route::put('/productos/{producto}', [
        ProductController::class, 'update'
    ])->name('productos.update');

    Route::delete('/productos/{producto}', [
        ProductController::class, 'destroy'
    ])->name('productos.destroy');

    Route::get('/ventas', [
    VentaController::class, 'index'
    ])->name('ventas.index');

    Route::get('/ventas/create', [
    VentaController::class, 'create'
    ])->name('ventas.create');

    Route::post('/ventas', [
    VentaController::class, 'store'
    ])->name('ventas.store');

    Route::get('/ventas/{venta}/edit', [
    VentaController::class, 'edit'
    ])->name('ventas.edit');

    Route::put('/ventas/{venta}', [
    VentaController::class, 'update'
    ])->name('ventas.update');

    Route::delete('/ventas/{venta}', [
    VentaController::class, 'destroy'
    ])->name('ventas.destroy');
});

//Usuarios admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');

    Route::get('/usuarios', [
        UserController::class, 'index'
    ])->name('usuarios.index');

    Route::get('/usuarios/create', [
        UserController::class, 'create'
    ])->name('usuarios.create');

    Route::post('/usuarios', [
        UserController::class, 'store'
    ])->name('usuarios.store');

    Route::get('/usuarios/{usuario}', [
        UserController::class, 'show'
    ])->name('usuarios.show');

    Route::get('/usuarios/{usuario}/edit', [
        UserController::class, 'edit'
    ])->name('usuarios.edit');

    Route::put('/usuarios/{usuario}', [
        UserController::class, 'update'
    ])->name('usuarios.update');

    Route::delete('/usuarios/{usuario}', [
        UserController::class, 'destroy'
    ])->name('usuarios.destroy');

});