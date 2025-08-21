<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-wide">
            Formulario de Postulación - {{ $publicacionBeca->id }}
        </h2>
    </x-slot>

    <form action="{{ route('postularse.beca', $publicacionBeca->id) }}" method="POST" class="space-y-4">
        @csrf

        {{-- Matrícula (oculta porque ya viene del usuario autenticado) --}}
        <input type="hidden" name="matricula" value="{{ Auth::user()->matricula }}">

        <!-- Ingreso Mensual -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Ingreso Mensual</label>
            <input type="number" name="ingreso_mensual" step="0.01" 
                value="{{ old('ingreso_mensual', $datoSocioeconomico->ingreso_mensual ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Tipo Vivienda -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Tipo de Vivienda</label>
            <input type="text" name="tipo_vivienda" 
                value="{{ old('tipo_vivienda', $datoSocioeconomico->tipo_vivienda ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Dependiente -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Dependiente</label>
            <input type="text" name="dependiente" 
                value="{{ old('dependiente', $datoSocioeconomico->dependiente ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Ocupación Dependiente -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Ocupación del Dependiente</label>
            <input type="text" name="ocupacion_dependiente" 
                value="{{ old('ocupacion_dependiente', $datoSocioeconomico->ocupacion_dependiente ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <!-- Dependientes Económicos -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Dependientes Económicos</label>
            <input type="number" name="dependientes_economicos" 
                value="{{ old('dependientes_economicos', $datoSocioeconomico->dependientes_economicos ?? '') }}"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <!-- Estado Civil -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Estado Civil</label>
            <select name="estado_civil" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="">-- Selecciona --</option>
                <option value="soltero" {{ old('estado_civil', $datoSocioeconomico->estado_civil ?? '') == 'soltero' ? 'selected' : '' }}>Soltero</option>
                <option value="casado" {{ old('estado_civil', $datoSocioeconomico->estado_civil ?? '') == 'casado' ? 'selected' : '' }}>Casado</option>
            </select>
        </div>

        <!-- Botón -->
        <div>
            <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700">
                Confirmar Postulación
            </button>
        </div>
    </form>
</x-app-layout>