<?php

namespace App\Http\Controllers;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('modules.usuarios.index');
    }
}