<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        return view('modules.roles.index');
    }

    public function edit($id)
    {
        return view('modules.roles.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Aquí va la lógica real de roles y permisos
        return redirect()->route('roles.index')->with('success', 'Rol actualizado');
    }
}