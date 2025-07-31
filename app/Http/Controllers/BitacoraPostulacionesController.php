<?php

namespace App\Http\Controllers;

use App\Models\BitacoraPostulacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BitacoraPostulacioneRequest;
use App\Models\BitacoraPostulacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BitacoraPostulacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bitacoraPostulaciones = BitacoraPostulacion::paginate();

        return view('bitacora-postulacione.index', compact('bitacoraPostulaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $bitacoraPostulaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $bitacoraPostulacione = new BitacoraPostulacion();

        return view('bitacora-postulacione.create', compact('bitacoraPostulacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BitacoraPostulacioneRequest $request): RedirectResponse
    {
        BitacoraPostulacion::create($request->validated());

        return Redirect::route('bitacora-postulaciones.index')
            ->with('success', 'BitacoraPostulacione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $bitacoraPostulacione = BitacoraPostulacion::find($id);

        return view('bitacora-postulacione.show', compact('bitacoraPostulacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $bitacoraPostulacione = BitacoraPostulacion::find($id);

        return view('bitacora-postulacione.edit', compact('bitacoraPostulacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BitacoraPostulacioneRequest $request, BitacoraPostulacion $bitacoraPostulacione): RedirectResponse
    {
        $bitacoraPostulacione->update($request->validated());

        return Redirect::route('bitacora-postulaciones.index')
            ->with('success', 'BitacoraPostulacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BitacoraPostulacion::find($id)->delete();

        return Redirect::route('bitacora-postulaciones.index')
            ->with('success', 'BitacoraPostulacione deleted successfully');
    }
}
