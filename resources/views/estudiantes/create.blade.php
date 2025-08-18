<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Nueva Postulación</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-6">

            {{-- Mensajes de validación --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                    <strong>⚠ Ocurrieron algunos errores:</strong>
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario de nueva postulación --}}
            <form action="{{ route('estudiante.postulaciones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Selección de convocatoria --}}
                <div>
                    <label for="convocatoria_id" class="block text-gray-700 font-semibold mb-2">Convocatoria</label>
                    <select name="convocatoria_id" id="convocatoria_id" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]">
                        <option value="">-- Selecciona una convocatoria --</option>
                        @foreach ($convocatorias as $convocatoria)
                            <option value="{{ $convocatoria->id }}">
                                {{ $convocatoria->titulo }} ({{ $convocatoria->anio }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Subida de documentos --}}
                <div>
                    <label for="documentos" class="block text-gray-700 font-semibold mb-2">Subir Documentos</label>
                    <input type="file" name="documentos[]" id="documentos" multiple
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]">
                    <p class="text-sm text-gray-500 mt-2">Puedes seleccionar varios archivos (PDF, JPG, PNG).</p>
                </div>

                {{-- Observaciones opcionales --}}
                <div>
                    <label for="observaciones" class="block text-gray-700 font-semibold mb-2">Observaciones (opcional)</label>
                    <textarea name="observaciones" id="observaciones" rows="4"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]"></textarea>
                </div>

                {{-- Botones --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('estudiante.postulaciones.index') }}"
                       class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-[#1C9600] text-white rounded-lg shadow hover:bg-green-700 transition">
                         Enviar Postulación
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>