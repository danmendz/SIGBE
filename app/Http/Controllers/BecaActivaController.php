<?php

namespace App\Http\Controllers;

use App\Models\BecaActiva;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BecaActivaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BecaActivaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $becaActivas = BecaActiva::where('estudiante_id', Auth::id())->paginate();

        return view('beca-activa.index', compact('becaActivas'))
            ->with('i', ($request->input('page', 1) - 1) * $becaActivas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $becaActiva = new BecaActiva();

        return view('beca-activa.create', compact('becaActiva'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BecaActivaRequest $request): RedirectResponse
    {
        BecaActiva::create($request->validated());

        return Redirect::route('beca-activas.index')
            ->with('success', 'BecaActiva created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $becaActiva = BecaActiva::find($id);

        return view('beca-activa.show', compact('becaActiva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $becaActiva = BecaActiva::find($id);

        return view('beca-activa.edit', compact('becaActiva'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BecaActivaRequest $request, BecaActiva $becaActiva): RedirectResponse
    {
        $becaActiva->update($request->validated());

        return Redirect::route('beca-activas.index')
            ->with('success', 'BecaActiva updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BecaActiva::find($id)->delete();

        return Redirect::route('beca-activas.index')
            ->with('success', 'BecaActiva deleted successfully');
    }
}
