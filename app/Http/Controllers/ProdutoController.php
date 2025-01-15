<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all(); // Pega todos os produtos do banco
        return view('produtos.index', compact('produtos'));
    }

}
