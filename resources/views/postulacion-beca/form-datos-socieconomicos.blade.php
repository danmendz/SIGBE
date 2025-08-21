<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-wide">
            Formulario de Postulación - {{ $publicacionBeca->tipoBeca->nombre }} - {{ $publicacionBeca->periodo->nombre_periodo }}
        </h2>
    </x-slot>

    <form action="{{ route('postularse.beca', $publicacionBeca->id) }}" method="POST" 
          class="bg-white shadow-lg rounded-xl p-6 border border-gray-100 max-w-3xl mx-auto space-y-6">
        @csrf

        {{-- Matrícula (oculta porque ya viene del usuario autenticado) --}}
        <input type="hidden" name="matricula" value="{{ Auth::user()->matricula }}">

        <!-- Ingreso Mensual -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Ingreso Mensual</label>
            <input type="number" name="ingreso_mensual" step="0.01" 
                value="{{ old('ingreso_mensual', $datoSocioeconomico->ingreso_mensual ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500 shadow-sm" required>
        </div>

        <!-- Tipo Vivienda -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Tipo de Vivienda</label>
            <input type="text" name="tipo_vivienda" 
                value="{{ old('tipo_vivienda', $datoSocioeconomico->tipo_vivienda ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500 shadow-sm" required>
        </div>

        <!-- Dependiente -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Dependiente</label>
            <input type="text" name="dependiente" 
                value="{{ old('dependiente', $datoSocioeconomico->dependiente ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500 shadow-sm" required>
        </div>

        <!-- Ocupación Dependiente -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Ocupación del Dependiente</label>
            <input type="text" name="ocupacion_dependiente" 
                value="{{ old('ocupacion_dependiente', $datoSocioeconomico->ocupacion_dependiente ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500 shadow-sm">
        </div>

        <!-- Dependientes Económicos -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Dependientes Económicos</label>
            <input type="number" name="dependientes_economicos" 
                value="{{ old('dependientes_economicos', $datoSocioeconomico->dependientes_economicos ?? '') }}"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500 shadow-sm">
        </div>

        <!-- Estado Civil -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Estado Civil</label>
            <select name="estado_civil" 
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500 shadow-sm" required>
                <option value="">-- Selecciona --</option>
                <option value="soltero" {{ old('estado_civil', $datoSocioeconomico->estado_civil ?? '') == 'soltero' ? 'selected' : '' }}>Soltero</option>
                <option value="casado" {{ old('estado_civil', $datoSocioeconomico->estado_civil ?? '') == 'casado' ? 'selected' : '' }}>Casado</option>
            </select>
        </div>

        <!-- Botón -->
        <div class="pt-4">
            <button type="submit" 
                class="w-full md:w-auto px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all duration-200 ease-in-out">
                Confirmar Postulación
            </button>
        </div>
    </form>
</x-app-layout>