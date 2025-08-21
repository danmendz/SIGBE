<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-wide">
            Postulación a la Beca
        </h2>
    </x-slot>

    <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100">
        <form action="{{ route('postularse.beca', $publicacionBeca->id) }}" method="POST">
            @csrf

            {{-- Matrícula (oculta porque ya viene del usuario autenticado) --}}
            <input type="hidden" name="matricula" value="{{ Auth::user()->matricula }}">

            {{-- Ingreso Mensual --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Ingreso Mensual</label>
                <input type="number" name="ingreso_mensual" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Tipo de Vivienda --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Tipo de Vivienda</label>
                <input type="text" name="tipo_vivienda" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Dependiente --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Dependiente</label>
                <input type="text" name="dependiente" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Ocupación del Dependiente --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Ocupación del Dependiente</label>
                <input type="text" name="ocupacion_dependiente" class="w-full border rounded-lg p-2">
            </div>

            {{-- Dependientes Económicos --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Dependientes Económicos</label>
                <input type="number" name="dependientes_economicos" class="w-full border rounded-lg p-2">
            </div>

            {{-- Estado Civil --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Estado Civil</label>
                <input type="text" name="estado_civil" class="w-full border rounded-lg p-2" required>
            </div>

            <button type="submit"
                class="w-full md:w-auto px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all duration-200 ease-in-out">
                Guardar y Postularse
            </button>
        </form>
    </div>
</x-app-layout>
