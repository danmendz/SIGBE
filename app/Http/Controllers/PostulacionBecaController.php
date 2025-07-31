<?php

namespace App\Http\Controllers;

use App\Models\PostulacionBeca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostulacionBecaRequest;
use App\Models\BitacoraPostulacion;
use App\Traits\ManejaPostulaciones;
use App\Traits\VerificarRolUsuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostulacionBecaController extends Controller
{
    // Import the ManejaPostulaciones trait to use its methods
    use ManejaPostulaciones;
    // Import the VerificarRolUsuario trait to use its methods
    use VerificarRolUsuario;

    /**
     * Aprueba una postulación a beca
     */
    public function aprobarBeca($id)
    {
        $postulacion = $this->encontrarPostulacionOError($id);
        
        if ($this->postulacionYaProcesada($postulacion)) {
            return Redirect::back()->with('error', 'La postulación ya ha sido procesada.');
        }

        $postulacion->update(['estatus' => 'aprobada']);
        $this->registrarBitacora($postulacion->id, 'Aprobada');
        $this->registrarBecaActiva($postulacion, Carbon::now());

        return Redirect::back()->with('success', 'Postulación aprobada correctamente.');
    }

    /**
     * Rechaza una postulación a beca
     */
    public function rechazarBeca(Request $request, $id)
    {
        $request->validate(['motivo_rechazo' => 'required|string|max:255']);
        
        $postulacion = $this->encontrarPostulacionOError($id);
        
        if ($this->postulacionYaProcesada($postulacion)) {
            return Redirect::back()->with('error', 'La postulación ya ha sido procesada.');
        }

        $postulacion->update([
            'estatus' => 'rechazada',
            'motivo_rechazo' => $request->motivo_rechazo
        ]);
        
        $this->registrarBitacora($postulacion->id, 'Rechazada');

        return Redirect::back()->with('success', 'Postulación rechazada correctamente.');
    }

    /**
     * Postula a un estudiante a una beca
     */
    public function postularse($id)
    {
        $estudianteId = Auth::id();

        if ($this->yaEstaPostulado($id, $estudianteId)) {
            return Redirect::back()->with('error', 'Ya estás postulado a esta beca.');
        }

        PostulacionBeca::create([
            'beca_publicada_id' => $id,
            'estudiante_id' => $estudianteId,
            'fecha_postulacion' => Carbon::now(),
            'estatus' => 'pendiente',
        ]);

        return Redirect::back()->with('success', 'Te has postulado correctamente.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $usuarioAutenticado = Auth::user();

        if ($this->verificarRol('revisor')) {
            $postulacionBecas = PostulacionBeca::paginate();

        } elseif ($this->verificarRol('estudiante')) {
            $postulacionBecas = PostulacionBeca::where('estudiante_id', $usuarioAutenticado->id)->paginate();

        } else {
            abort(403, 'No tienes permiso para ver esta sección.');
        }

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
