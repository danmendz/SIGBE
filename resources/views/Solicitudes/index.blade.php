<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Solicitudes</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Título --}}
            <div class="mb-6 text-center">
                <h3 class="text-3xl font-bold text-gray-800">Mis Solicitudes</h3>
                <p class="text-gray-600">Aquí podrás revisar y dar seguimiento a tus solicitudes de beca.</p>
            </div>

            {{-- Botón nueva solicitud (solo estudiantes) --}}
            @if(Auth::user()->rol === 'estudiante')
                <div class="mb-6 text-right">
                    <a href="{{ route('solicitudes.create') }}"
                       class="bg-[#1C9600] hover:bg-[#00FF6F] text-white font-semibold px-5 py-2 rounded-lg shadow">
                        ➕ Nueva Solicitud
                    </a>
                </div>
            @endif

            {{-- Tabla de solicitudes --}}
            <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#4CB944] text-white">
                        <tr>
                            <th class="py-3 px-4">Convocatoria</th>
                            <th class="py-3 px-4">Estado</th>
                            <th class="py-3 px-4">Fecha de Solicitud</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($solicitudes as $solicitud)
                            <tr class="border-b hover:bg-[#00FF6F]/10 transition">
                                <td class="py-3 px-4 font-semibold text-gray-800">
                                    {{ $solicitud->convocatoria->titulo ?? 'N/A' }}
                                </td>
                                <td class="py-3 px-4">
                                    @if($solicitud->estado === 'pendiente')
                                        <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700">Pendiente</span>
                                    @elseif($solicitud->estado === 'aprobada')
                                        <span class="px-2 py-1 rounded bg-green-100 text-green-700">Aprobada</span>
                                    @elseif($solicitud->estado === 'rechazada')
                                        <span class="px-2 py-1 rounded bg-red-100 text-red-700">Rechazada</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">{{ $solicitud->created_at->format('d/m/Y') }}</td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ route('solicitudes.show', $solicitud->id) }}"
                                       class="text-[#1C9600] font-semibold hover:underline">Ver</a>
                                    @if(Auth::user()->rol === 'estudiante' && $solicitud->estado === 'pendiente')
                                        | <a href="{{ route('solicitudes.edit', $solicitud->id) }}"
                                             class="text-[#00FF6F] font-semibold hover:underline">Editar</a>
                                        | <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 font-semibold hover:underline"
                                                    onclick="return confirm('¿Seguro de eliminar esta solicitud?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-500">
                                    No tienes solicitudes registradas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
