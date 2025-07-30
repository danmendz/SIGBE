<?php

namespace App\Http\Controllers;

use App\Models\PostulacionBeca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostulacionBecaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostulacionBecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $postulacionBecas = PostulacionBeca::where('estudiante_id', Auth::id())->paginate();

        return view('postulacion-beca.index', compact('postulacionBecas'))
            ->with('i', ($request->input('page', 1) - 1) * $postulacionBecas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $postulacionBeca = new PostulacionBeca();

        return view('postulacion-beca.create', compact('postulacionBeca'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostulacionBecaRequest $request): RedirectResponse
    {
        PostulacionBeca::create($request->validated());

        return Redirect::route('postulacion-becas.index')
            ->with('success', 'PostulacionBeca created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $postulacionBeca = PostulacionBeca::find($id);

        return view('postulacion-beca.show', compact('postulacionBeca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $postulacionBeca = PostulacionBeca::find($id);

        return view('postulacion-beca.edit', compact('postulacionBeca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostulacionBecaRequest $request, PostulacionBeca $postulacionBeca): RedirectResponse
    {
        $postulacionBeca->update($request->validated());

        return Redirect::route('postulacion-becas.index')
            ->with('success', 'PostulacionBeca updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PostulacionBeca::find($id)->delete();

        return Redirect::route('postulacion-becas.index')
            ->with('success', 'PostulacionBeca deleted successfully');
    }
}
