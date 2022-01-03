<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Mostra a página inicial do usuário logado, passando o usuário logado para página
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $user = Auth::user();

        return view('home', ['user' => $user]);
    }
}
