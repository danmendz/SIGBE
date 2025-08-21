<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\PublicacionBecaService;
use App\Models\RequisitoVerificado;
use App\Models\PostulacionBeca;
use Carbon\Carbon;
use App\Traits\ManejaPostulaciones;

class VerificarRequisitos extends Component
{
    use ManejaPostulaciones;

    public $postulacionId;
    public $publicacionBecaId;
    public $requisitos = [];
    public $respuestas = [];
    public $motivoRechazo = '';
    public $mostrarMotivoRechazo = false;
    public $procesado = false;

    // Mensajes inmediatos del componente
    public $successMessage = '';
    public $errorMessage = '';

    protected $rules = [
        'respuestas.*.cumplido' => 'required|in:0,1',
        'respuestas.*.observaciones' => 'nullable|string|max:255',
        'motivoRechazo' => 'required_if:mostrarMotivoRechazo,true|string|max:255',
    ];

    protected $messages = [
        'respuestas.*.cumplido.required' => 'Debe indicar si cumple o no el requisito.',
        'respuestas.*.cumplido.in' => 'Valor inválido para el requisito.',
        'respuestas.*.observaciones.max' => 'Las observaciones no pueden tener más de 255 caracteres.',
        'motivoRechazo.required_if' => 'Debe ingresar un motivo para rechazar la beca.',
        'motivoRechazo.max' => 'El motivo no puede tener más de 255 caracteres.',
    ];

    // Permitir pasar postulacionId cuando se monta el componente
    public function mount($postulacionId)
    {
        if ($postulacionId) {
            $this->postulacionId = $postulacionId;
        } elseif (!$this->postulacionId) {
            $this->addError('postulacion', 'Postulación no encontrada');
        }

        $this->cargarDatosPostulacion();
    }

    protected function cargarDatosPostulacion()
    {
        $postulacion = PostulacionBeca::find($this->postulacionId);

        if (!$postulacion) {
            $this->addError('postulacion', 'Postulación no encontrada');
            $this->errorMessage = 'Postulación no encontrada';
            return;
        }

        $this->publicacionBecaId = $postulacion->beca_publicada_id;
        $this->procesado = in_array($postulacion->estatus, ['aprobada', 'rechazada']);

        $service = app(PublicacionBecaService::class);
        $info = $service->obtenerInfoPublicacionPorId($this->publicacionBecaId);

        if (!$info) {
            $this->addError('publicacion', 'No se encontró la publicación de beca');
            $this->errorMessage = 'No se encontró la publicación de beca';
            return;
        }

        $this->requisitos = $info['requisitos']->toArray();
        $this->cargarRespuestasExistentes();
    }

    protected function cargarRespuestasExistentes()
    {
        $respuestasExistentes = RequisitoVerificado::where('postulacion_id', $this->postulacionId)
            ->get()
            ->keyBy('requisito_id');

        foreach ($this->requisitos as $req) {
            $existing = $respuestasExistentes->get($req['id']);
            $this->respuestas[$req['id']] = [
                // Si ya existe, usar valor (0/1), si no existe, dejar null para forzar elección
                'cumplido' => isset($existing) ? (string) intval($existing->cumplido) : null,
                'observaciones' => isset($existing) ? $existing->observaciones : '',
            ];
        }
    }

    public function mostrarFormularioRechazo()
    {
        $this->mostrarMotivoRechazo = true;
        // si quisieras notificar JS: $this->dispatchBrowserEvent('mostrar-modal-rechazo');
    }

    public function cancelarRechazo()
    {
        $this->mostrarMotivoRechazo = false;
        $this->motivoRechazo = '';
        $this->resetValidation(['motivoRechazo']);
    }

    public function aceptarBeca()
    {
        // limpiar errores previos
        $this->resetErrorBag();
        $this->successMessage = '';
        $this->errorMessage = '';

        // validar con las reglas definidas
        $this->validate();

        try {
            $this->guardarRespuestas();

            $postulacion = PostulacionBeca::find($this->postulacionId);
            if (!$postulacion) {
                $this->errorMessage = 'Postulación no encontrada';
                return;
            }

            if ($this->postulacionYaProcesada($postulacion)) {
                $this->errorMessage = 'La postulación ya ha sido procesada.';
                return;
            }

            $postulacion->update(['estatus' => 'aprobada']);
            $this->registrarBitacora($postulacion->id, 'Aprobada');
            $this->registrarBecaActiva($postulacion, Carbon::now());

            $this->procesado = true;
            $this->successMessage = 'Postulación aprobada correctamente.';

            // emitir evento JS si hace falta
            $this->emit('postulacionProcesada', $postulacion->id);

        } catch (\Exception $e) {
            $this->errorMessage = 'Error al aprobar la beca: ' . $e->getMessage();
        }
    }

    public function rechazarBeca()
    {
        $this->resetErrorBag();
        $this->successMessage = '';
        $this->errorMessage = '';

        // valida motivo si mostrarMotivoRechazo está activo y las respuestas
        $this->validate();

        try {
            $this->guardarRespuestas();

            $postulacion = PostulacionBeca::find($this->postulacionId);
            if (!$postulacion) {
                $this->errorMessage = 'Postulación no encontrada';
                return;
            }

            if ($this->postulacionYaProcesada($postulacion)) {
                $this->errorMessage = 'La postulación ya ha sido procesada.';
                return;
            }

            $postulacion->update([
                'estatus' => 'rechazada',
                'motivo_rechazo' => $this->motivoRechazo,
            ]);
            $this->registrarBitacora($postulacion->id, 'Rechazada');

            $this->procesado = true;
            $this->mostrarMotivoRechazo = false;
            $this->successMessage = 'Postulación rechazada correctamente.';

            $this->emit('postulacionProcesada', $postulacion->id);

        } catch (\Exception $e) {
            $this->errorMessage = 'Error al rechazar la beca: ' . $e->getMessage();
        }
    }

    protected function guardarRespuestas()
    {
        foreach ($this->respuestas as $requisitoId => $datos) {
            // fuerza 0/1
            $cumplido = isset($datos['cumplido']) ? (int) $datos['cumplido'] : 0;

            RequisitoVerificado::updateOrCreate(
                [
                    'postulacion_id' => $this->postulacionId,
                    'requisito_id' => $requisitoId,
                ],
                [
                    'cumplido' => $cumplido,
                    'observaciones' => $datos['observaciones'] ?? '',
                ]
            );
        }
    }

    public function guardar()
    {
        $this->guardarRespuestas();
    }


    public function render()
    {
        // usa tu layout principal (si no quieres layout, elimina ->layout(...))
        return view('livewire.verificar-requisitos')->layout('layouts.app');
    }
}