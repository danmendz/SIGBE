<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Mis Postulaciones</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Mensajes --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Tabla de postulaciones --}}
            <div class="bg-gray-50 rounded-lg shadow-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Historial de Postulaciones</h3>
                <p class="text-gray-600 mb-6">
                    Aquí puedes consultar tus postulaciones realizadas a convocatorias de becas.
                </p>

                @if ($postulaciones->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden shadow">
                            <thead class="bg-[#1C9600] text-white">
                                <tr>
                                    <th class="px-4 py-3 text-left">Convocatoria</th>
                                    <th class="px-4 py-3 text-left">Año</th>
                                    <th class="px-4 py-3 text-center">Estado</th>
                                    <th class="px-4 py-3 text-center">Fecha</th>
                                    <th class="px-4 py-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($postulaciones as $postulacion)
                                    <tr class="hover:bg-gray-100 transition">
                                        <td class="px-4 py-3">{{ $postulacion->convocatoria->titulo }}</td>
                                        <td class="px-4 py-3">{{ $postulacion->convocatoria->anio }}</td>
                                        <td class="px-4 py-3 text-center">
                                            @if ($postulacion->estado == 'pendiente')
                                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">Pendiente</span>
                                            @elseif ($postulacion->estado == 'aprobada')
                                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">Aprobada</span>
                                            @elseif ($postulacion->estado == 'rechazada')
                                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">Rechazada</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            {{ $postulacion->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <a href="{{ route('estudiante.postulaciones.show', $postulacion->id) }}"
                                               class="text-[#1C9600] font-semibold hover:underline">
                                                🔍 Ver detalles
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-6">❌ Aún no has realizado ninguna postulación.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>