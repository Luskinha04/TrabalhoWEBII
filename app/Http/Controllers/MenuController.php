<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Exibe a página inicial do menu.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('menu');
    }
}
