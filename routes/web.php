<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
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

// Página inicial (Login)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard padrão
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas para os perfis (Autenticação)
Route::middleware(['auth'])->group(function () {
    // Página inicial do menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');

    // Rotas específicas para "patrão"
    Route::middleware(['auth', 'role.patrao'])->group(function () {
        Route::resource('categorias', CategoryController::class);
    });

    // Rotas específicas para "funcionário"
    Route::middleware('role:funcionario')->group(function () {
        Route::resource('produtos', ProdutoController::class);
        Route::resource('order', OrderController::class);
    });

    // Rotas acessíveis a ambos
    Route::resource('clientes', ClienteController::class);
});

// Rotas relacionadas ao perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas específicas para "patrão" acessarem "order"
Route::middleware(['role:patrão'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
});

// Inclui as rotas de autenticação (Laravel Breeze)
require __DIR__ . '/auth.php';
