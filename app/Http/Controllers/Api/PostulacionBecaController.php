<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostulacionBeca;
use Illuminate\Http\Request;
use App\Http\Resources\PostulacionBecaResource;

class PostulacionBecaController extends Controller
{
    public function index()
    {
        $postulaciones = PostulacionBeca::with([
            'usuario',
            'publicacionBeca.tipoBeca.requisitos',
            'publicacionBeca.periodo'
        ])->get();

        return PostulacionBecaResource::collection($postulaciones);
    }
}
