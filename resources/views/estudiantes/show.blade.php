<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Detalle de la Postulación</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-5xl mx-auto px-6">

            {{-- Información de la convocatoria --}}
            <div class="bg-gray-50 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    {{ $postulacion->convocatoria->titulo }}
                </h3>
                <p class="text-gray-600">
                    <strong>Año:</strong> {{ $postulacion->convocatoria->anio }}
                </p>
                <p class="text-gray-600">
                    <strong>Descripción:</strong> {{ $postulacion->convocatoria->descripcion }}
                </p>
            </div>

            {{-- Estado --}}
            <div class="bg-gray-50 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Estado de la Postulación</h3>
                @if ($postulacion->estado == 'pendiente')
                    <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">Pendiente</span>
                @elseif ($postulacion->estado == 'aprobada')
                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">✅ Aprobada</span>
                @elseif ($postulacion->estado == 'rechazada')
                    <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">❌ Rechazada</span>
                @endif
            </div>

            {{-- Documentos --}}
            <div class="bg-gray-50 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Documentación Entregada</h3>

                @if ($postulacion->documentos->count() > 0)
                    <ul class="list-disc pl-6 space-y-2">
                        @foreach ($postulacion->documentos as $doc)
                            <li>
                                <a href="{{ asset('storage/' . $doc->archivo) }}" target="_blank"
                                   class="text-[#1C9600] font-semibold hover:underline">
                                    📄 {{ $doc->nombre }}
                                </a>
                                <span class="text-gray-500 text-sm">
                                    (Subido el {{ $doc->created_at->format('d/m/Y') }})
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">❌ No se han subido documentos para esta postulación.</p>
                @endif
            </div>

            {{-- Observaciones / comentarios --}}
            <div class="bg-gray-50 rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Observaciones del Comité</h3>
                @if ($postulacion->observaciones)
                    <p class="text-gray-700 italic">"{{ $postulacion->observaciones }}"</p>
                @else
                    <p class="text-gray-500">📌 No hay observaciones registradas aún.</p>
                @endif
            </div>

            {{-- Botón volver --}}
            <div class="flex justify-end">
                <a href="{{ route('estudiante.postulaciones.index') }}"
                   class="px-6 py-2 bg-[#1C9600] text-white rounded-lg shadow hover:bg-green-700 transition">
                    ⬅ Volver al historial
                </a>
            </div>

        </div>
    </div>
</x-app-layout>