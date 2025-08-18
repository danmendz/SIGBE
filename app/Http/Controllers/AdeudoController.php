<?php

namespace App\Http\Controllers;

class AdeudoController extends Controller
{
    public function index()
    {
        return view('modules.adeudos.index');
    }
}