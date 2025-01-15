<?php

use App\Http\Controllers\ProdutoControllerAdmin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('usuario.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos');


Route::get('/carrinho', [VendaController::class, 'showCarrinho'])->name('carrinho');
Route::post('/venda', [VendaController::class, 'criarVenda'])->name('venda.criar');
Route::get('/venda/sucesso', [VendaController::class, 'vendaSucesso'])->name('venda.sucesso');


Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::group(['before' => 'auth'], function () {
        Route::resource('produtos', ProdutoControllerAdmin::class)->except(['show']);
    });
});