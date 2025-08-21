<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostulacionBecaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'beca_publicada_id' => 'required|exists:publicacion_becas,id',
            'estudiante_id' => 'required|exists:users,id',
            'fecha_postulacion' => 'required|date',
            'estatus' => 'required|in:pendiente,aprobada,rechazada',
            'datos_socioeconomicos' => 'required',
            'motivo_rechazo' => 'nullable|string|max:255',
        ];
    }
}
