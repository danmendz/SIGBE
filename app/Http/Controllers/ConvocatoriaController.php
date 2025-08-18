<?php

namespace App\Http\Controllers;

class ConvocatoriaController extends Controller
{
    public function index()
    {
        return view('modules.convocatorias.index');
    }
}