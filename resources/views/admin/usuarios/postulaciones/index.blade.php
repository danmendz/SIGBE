<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Gestión de Postulaciones</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Título --}}
            <div class="mb-6 text-center">
                <h3 class="text-3xl font-bold text-gray-800">Postulaciones de Estudiantes</h3>
                <p class="text-gray-600">Revisa y administra las solicitudes de beca enviadas por los estudiantes.</p>
            </div>

            {{-- Tabla de postulaciones --}}
            <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#1C9600] text-white">
                        <tr>
                            <th class="py-3 px-4">Estudiante</th>
                            <th class="py-3 px-4">Matrícula</th>
                            <th class="py-3 px-4">Convocatoria</th>
                            <th class="py-3 px-4">Fecha</th>
                            <th class="py-3 px-4">Estado</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($postulaciones as $post)
                            <tr class="border-b hover:bg-[#00FF6F]/10 transition">
                                <td class="py-3 px-4 font-semibold text-gray-800">
                                    {{ $post->usuario->nombre }}
                                </td>
                                <td class="py-3 px-4 text-gray-700">
                                    {{ $post->usuario->matricula }}
                                </td>
                                <td class="py-3 px-4">
                                    {{ $post->convocatoria->titulo }}
                                </td>
                                <td class="py-3 px-4">
                                    {{ $post->created_at->format('d/m/Y') }}
                                </td>
                                <td class="py-3 px-4">
                                    @if($post->estado === 'pendiente')
                                        <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700">Pendiente</span>
                                    @elseif($post->estado === 'aprobada')
                                        <span class="px-2 py-1 rounded bg-green-100 text-green-700">Aprobada</span>
                                    @else
                                        <span class="px-2 py-1 rounded bg-red-100 text-red-700">Rechazada</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <form action="{{ route('admin.postulaciones.aprobar', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                                class="bg-[#1C9600] text-white px-3 py-1 rounded-lg hover:bg-[#00FF6F] transition">
                                            ✅ Aprobar
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.postulaciones.rechazar', $post->id) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-500 transition">
                                            ❌ Rechazar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-500">
                                    No hay postulaciones registradas en el sistema
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>