<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">📋 Postulaciones Pendientes de Revisión</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Tabla de postulaciones --}}
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-[#1C9600] text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">Estudiante</th>
                            <th class="px-4 py-3 text-left">Matrícula</th>
                            <th class="px-4 py-3 text-left">Convocatoria</th>
                            <th class="px-4 py-3 text-left">Fecha</th>
                            <th class="px-4 py-3 text-center">Estado</th>
                            <th class="px-4 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($postulaciones as $postulacion)
                            <tr>
                                <td class="px-4 py-3">{{ $postulacion->usuario->nombre }}</td>
                                <td class="px-4 py-3">{{ $postulacion->usuario->matricula }}</td>
                                <td class="px-4 py-3">{{ $postulacion->convocatoria->titulo }}</td>
                                <td class="px-4 py-3">{{ $postulacion->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($postulacion->estado == 'pendiente')
                                        <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-lg text-sm">Pendiente</span>
                                    @elseif($postulacion->estado == 'aprobada')
                                        <span class="bg-green-200 text-green-800 px-3 py-1 rounded-lg text-sm">Aprobada</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 px-3 py-1 rounded-lg text-sm">Rechazada</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('revisor.postulaciones.show', $postulacion->id) }}"
                                       class="px-4 py-2 bg-[#00FF6F] text-gray-900 rounded-lg shadow hover:bg-[#1C9600] hover:text-white transition">
                                        Revisar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                    No hay postulaciones pendientes de revisión.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>