<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Gestión de Documentación</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Título --}}
            <div class="mb-6 text-center">
                <h3 class="text-3xl font-bold text-gray-800">Expedientes de Estudiantes</h3>
                <p class="text-gray-600">Aquí puedes revisar, aprobar o rechazar los documentos enviados por los estudiantes.</p>
            </div>

            {{-- Tabla de documentación --}}
            <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#1C9600] text-white">
                        <tr>
                            <th class="py-3 px-4">Estudiante</th>
                            <th class="py-3 px-4">Matrícula</th>
                            <th class="py-3 px-4">Documento</th>
                            <th class="py-3 px-4">Estado</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documentos as $doc)
                            <tr class="border-b hover:bg-[#00FF6F]/10 transition">
                                <td class="py-3 px-4 font-semibold text-gray-800">
                                    {{ $doc->usuario->nombre }}
                                </td>
                                <td class="py-3 px-4 text-gray-700">
                                    {{ $doc->usuario->matricula }}
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ asset('storage/'.$doc->archivo) }}"
                                       target="_blank"
                                       class="text-blue-600 font-semibold hover:underline">
                                        📄 Ver Documento
                                    </a>
                                </td>
                                <td class="py-3 px-4">
                                    @if($doc->estado === 'pendiente')
                                        <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700">Pendiente</span>
                                    @elseif($doc->estado === 'aprobado')
                                        <span class="px-2 py-1 rounded bg-green-100 text-green-700">Aprobado</span>
                                    @else
                                        <span class="px-2 py-1 rounded bg-red-100 text-red-700">Rechazado</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <form action="{{ route('admin.documentacion.aprobar', $doc->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                                class="bg-[#1C9600] text-white px-3 py-1 rounded-lg hover:bg-[#00FF6F] transition">
                                            ✅ Aprobar
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.documentacion.rechazar', $doc->id) }}" method="POST" class="inline ml-2">
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
                                <td colspan="5" class="py-6 text-center text-gray-500">
                                    No hay documentos cargados por los estudiantes
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>