<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Página principal después del login.
     */
    public function index()
    {
        $usuario = auth()->user();
        return view('home', compact('usuario'));
    }
}
