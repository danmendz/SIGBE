<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Revisión de Postulación</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-5xl mx-auto px-6 space-y-6">

            {{-- Datos del estudiante --}}
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">👩‍🎓 Información del Estudiante</h3>
                <p><strong>Nombre:</strong> {{ $postulacion->usuario->nombre }}</p>
                <p><strong>Matrícula:</strong> {{ $postulacion->usuario->matricula }}</p>
                <p><strong>Convocatoria:</strong> {{ $postulacion->convocatoria->titulo }} ({{ $postulacion->convocatoria->anio }})</p>
                <p><strong>Fecha de envío:</strong> {{ $postulacion->created_at->format('d/m/Y H:i') }}</p>
            </div>

            {{-- Documentos enviados --}}
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">📂 Documentos Enviados</h3>
                <ul class="list-disc pl-6 space-y-2">
                    @foreach ($postulacion->documentos as $documento)
                        <li>
                            <a href="{{ asset('storage/documentos/' . $documento->archivo) }}" target="_blank"
                               class="text-[#1C9600] font-semibold hover:underline">
                                📄 {{ $documento->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Observaciones anteriores (si las hubiera) --}}
            @if($postulacion->observaciones)
                <div class="bg-yellow-100 p-6 rounded-lg shadow">
                    <h3 class="font-bold text-lg mb-4">📝 Observaciones del Estudiante</h3>
                    <p>{{ $postulacion->observaciones }}</p>
                </div>
            @endif

            {{-- Formulario de revisión --}}
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h3 class="font-bold text-lg mb-4">⚖ Decisión del Revisor</h3>

                <form action="{{ route('revisor.postulaciones.update', $postulacion->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Estado --}}
                    <div>
                        <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado de la postulación</label>
                        <select name="estado" id="estado" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]">
                            <option value="">-- Selecciona una opción --</option>
                            <option value="aprobada">✅ Aprobar</option>
                            <option value="rechazada">❌ Rechazar</option>
                        </select>
                    </div>

                    {{-- Observaciones --}}
                    <div>
                        <label for="observaciones_revisor" class="block text-gray-700 font-semibold mb-2">Observaciones</label>
                        <textarea name="observaciones_revisor" id="observaciones_revisor" rows="4"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1C9600] focus:border-[#1C9600]"></textarea>
                    </div>

                    {{-- Botones --}}
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('revisor.postulaciones.index') }}"
                           class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition">
                            Volver
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-[#1C9600] text-white rounded-lg shadow hover:bg-green-700 transition">
                            Guardar Revisión
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>