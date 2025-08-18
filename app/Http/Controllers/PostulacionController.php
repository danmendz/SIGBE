<?php

namespace App\Http\Controllers;

class PostulacionController extends Controller
{
    public function index()
    {
        return view('modules.postulaciones.index');
    }
}