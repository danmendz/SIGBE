<?php

namespace App\Http\Controllers;

use App\Models\DatoSocioeconomico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DatoSocioeconomicoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DatoSocioeconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $datoSocioeconomicos = DatoSocioeconomico::paginate();

        return view('dato-socioeconomico.index', compact('datoSocioeconomicos'))
            ->with('i', ($request->input('page', 1) - 1) * $datoSocioeconomicos->perPage());
    }

    public function consultarPorMatriculaUrl($matricula)
    {
        if ($matricula !== auth()->user()->matricula) {
            abort(403, 'No tienes permiso para acceder a esta información.');
        }

        return $this->consultarDatosSocieconomicos($matricula);
    }

    public function consultarDatosSocieconomicos($matricula)
    {
        $datoSocioeconomicos = DatoSocioeconomico::where('matricula', $matricula)->paginate();

        return view('dato-socioeconomico.mis-datos-socieconomicos', compact('datoSocioeconomicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $datoSocioeconomico = new DatoSocioeconomico();

        return view('dato-socioeconomico.create', compact('datoSocioeconomico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DatoSocioeconomicoRequest $request): RedirectResponse
    {
        DatoSocioeconomico::create($request->validated());

        return Redirect::route('dato-socioeconomicos.index')
            ->with('success', 'DatoSocioeconomico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $datoSocioeconomico = DatoSocioeconomico::find($id);

        return view('dato-socioeconomico.show', compact('datoSocioeconomico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $datoSocioeconomico = DatoSocioeconomico::find($id);

        return view('dato-socioeconomico.edit', compact('datoSocioeconomico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DatoSocioeconomicoRequest $request, DatoSocioeconomico $datoSocioeconomico): RedirectResponse
    {
        $datoSocioeconomico->update($request->validated());

        return Redirect::route('dato-socioeconomicos.index')
            ->with('success', 'DatoSocioeconomico updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DatoSocioeconomico::find($id)->delete();

        return Redirect::route('dato-socioeconomicos.index')
            ->with('success', 'DatoSocioeconomico deleted successfully');
    }
}
