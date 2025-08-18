<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Nueva Postulación</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-3xl mx-auto px-6">

            {{-- Mensajes --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow">
                    ✅ {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded-lg shadow">
                    ❌ {{ session('error') }}
                </div>
            @endif

            {{-- Formulario --}}
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Postulación a beca</h3>
                <p class="text-gray-600 mb-6">
                    Completa la información para enviar tu postulación a la convocatoria seleccionada.
                </p>

                <form action="{{ route('estudiante.postulaciones.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Convocatoria --}}
                    <div class="mb-4">
                        <label for="convocatoria_id" class="block text-gray-700 font-semibold mb-2">
                            Convocatoria
                        </label>
                        <select name="convocatoria_id" id="convocatoria_id"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]">
                            <option value="">Selecciona una convocatoria</option>
                            @foreach ($convocatorias as $convocatoria)
                                <option value="{{ $convocatoria->id }}">
                                    {{ $convocatoria->titulo }} ({{ $convocatoria->anio }})
                                </option>
                            @endforeach
                        </select>
                        @error('convocatoria_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Documentos --}}
                    <div class="mb-4">
                        <label for="documentos" class="block text-gray-700 font-semibold mb-2">
                            Documentos requeridos
                        </label>
                        <input type="file" name="documentos[]" id="documentos" multiple
                               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]">
                        <p class="text-gray-500 text-sm mt-1">Puedes subir varios documentos (PDF, JPG, PNG).</p>
                        @error('documentos')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Comentarios --}}
                    <div class="mb-4">
                        <label for="comentarios" class="block text-gray-700 font-semibold mb-2">
                            Comentarios adicionales
                        </label>
                        <textarea name="comentarios" id="comentarios" rows="4"
                                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]"></textarea>
                        @error('comentarios')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Botón --}}
                    <div class="text-center">
                        <button type="submit"
                                class="bg-[#1C9600] hover:bg-[#00FF6F] text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                             Enviar postulación
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>