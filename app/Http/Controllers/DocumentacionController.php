<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentacionController extends Controller
{
    public function index()
    {
        return view('documentacion.index');
    }

    public function create()
    {
        return view('documentacion.create');
    }

    public function store(Request $request)
    {
        // Aquí irá la lógica para guardar documentos en BD o storage
    }
}