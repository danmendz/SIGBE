<?php

namespace App\Http\Controllers;

use App\Models\PublicacionBeca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PublicacionBecaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PublicacionBecaController extends Controller
{
    public function consultarRequisitosDeBeca($id)
    {
        $publicacionBeca = PublicacionBeca::find($id);

        if (!$publicacionBeca) {
            return Redirect::back()->with('error', 'La publicación de beca no existe.');
        }

        $tipoBeca = $publicacionBeca->tipoBeca;
        $periodo = $publicacionBeca->periodo;
        $requisitos = $tipoBeca->requisitos;

        return view('publicacion-beca.show-requisitos', compact(
            'publicacionBeca',
            'tipoBeca',
            'periodo',
            'requisitos'
        ));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $publicacionBecas = PublicacionBeca::paginate();

        return view('publicacion-beca.index', compact('publicacionBecas'))
            ->with('i', ($request->input('page', 1) - 1) * $publicacionBecas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $publicacionBeca = new PublicacionBeca();

        return view('publicacion-beca.create', compact('publicacionBeca'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicacionBecaRequest $request): RedirectResponse
    {
        PublicacionBeca::create($request->validated());

        return Redirect::route('publicacion-becas.index')
            ->with('success', 'PublicacionBeca created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $publicacionBeca = PublicacionBeca::find($id);

        return view('publicacion-beca.show', compact('publicacionBeca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $publicacionBeca = PublicacionBeca::find($id);

        return view('publicacion-beca.edit', compact('publicacionBeca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicacionBecaRequest $request, PublicacionBeca $publicacionBeca): RedirectResponse
    {
        $publicacionBeca->update($request->validated());

        return Redirect::route('publicacion-becas.index')
            ->with('success', 'PublicacionBeca updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PublicacionBeca::find($id)->delete();

        return Redirect::route('publicacion-becas.index')
            ->with('success', 'PublicacionBeca deleted successfully');
    }
}
