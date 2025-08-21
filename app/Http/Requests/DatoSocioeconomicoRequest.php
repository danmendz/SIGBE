<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatoSocioeconomicoRequest extends FormRequest
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
			'matricula' => 'required|string',
			'ingreso_mensual' => 'required',
			'tipo_vivienda' => 'required|string',
			'dependiente' => 'required|string',
			'ocupacion_dependiente' => 'required|string',
			'dependientes_economicos' => 'required',
			'estado_civil' => 'required',
        ];
    }
}
