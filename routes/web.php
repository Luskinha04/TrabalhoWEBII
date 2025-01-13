<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\OrderController;

// Rota inicial
Route::get('/', function () {
    return view('menu');
})->name('menu');

// Rotas CRUD para Categorias
Route::resource('categorias', CategoryController::class)->names([
    'index' => 'categorias.index',
    'create' => 'categorias.create',
    'store' => 'categorias.store',
    'show' => 'categorias.show',
    'edit' => 'categorias.edit',
    'update' => 'categorias.update',
    'destroy' => 'categorias.destroy',
]);

// Rotas CRUD para Clientes
Route::resource('clientes', ClienteController::class)->names([
    'index' => 'clientes.index',
    'create' => 'clientes.create',
    'store' => 'clientes.store',
    'show' => 'clientes.show',
    'edit' => 'clientes.edit',
    'update' => 'clientes.update',
    'destroy' => 'clientes.destroy',
]);

// Rotas CRUD para Produtos
Route::resource('produtos', ProdutoController::class)->names([
    'index' => 'produtos.index',
    'create' => 'produtos.create',
    'store' => 'produtos.store',
    'show' => 'produtos.show',
    'edit' => 'produtos.edit',
    'update' => 'produtos.update',
    'destroy' => 'produtos.destroy',
]);

// Rotas CRUD para Pedidos (Orders)
Route::resource('order', OrderController::class)->names([
    'index' => 'order.index',
    'create' => 'order.create',
    'store' => 'order.store',
    'show' => 'order.show',
    'edit' => 'order.edit',
    'update' => 'order.update',
    'destroy' => 'order.destroy',
]);
