<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        return view('modules.perfil.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
        ]);

        $user->nombre = $request->nombre;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}