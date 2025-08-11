<?php

namespace App\Http\Controllers;

use App\Models\RequisitoVerificado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RequisitoVerificadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RequisitoVerificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $requisitoVerificados = RequisitoVerificado::paginate();

        return view('requisito-verificado.index', compact('requisitoVerificados'))
            ->with('i', ($request->input('page', 1) - 1) * $requisitoVerificados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $requisitoVerificado = new RequisitoVerificado();

        return view('requisito-verificado.create', compact('requisitoVerificado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequisitoVerificadoRequest $request): RedirectResponse
    {
        RequisitoVerificado::create($request->validated());

        return Redirect::route('requisito-verificados.index')
            ->with('success', 'RequisitoVerificado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $requisitoVerificado = RequisitoVerificado::find($id);

        return view('requisito-verificado.show', compact('requisitoVerificado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $requisitoVerificado = RequisitoVerificado::find($id);

        return view('requisito-verificado.edit', compact('requisitoVerificado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequisitoVerificadoRequest $request, RequisitoVerificado $requisitoVerificado): RedirectResponse
    {
        $requisitoVerificado->update($request->validated());

        return Redirect::route('requisito-verificados.index')
            ->with('success', 'RequisitoVerificado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RequisitoVerificado::find($id)->delete();

        return Redirect::route('requisito-verificados.index')
            ->with('success', 'RequisitoVerificado deleted successfully');
    }
}
