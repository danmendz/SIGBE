<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Convocatorias</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Título --}}
            <div class="mb-6 text-center">
                <h3 class="text-3xl font-bold text-gray-800">Convocatorias Disponibles</h3>
                <p class="text-gray-600">Aquí podrás consultar las becas abiertas y sus requisitos.</p>
            </div>

            {{-- Botón crear nueva convocatoria (si es admin, ejemplo) --}}
            @if(Auth::user()->rol === 'administrador')
                <div class="mb-6 text-right">
                    <a href="{{ route('convocatorias.create') }}"
                       class="bg-[#1C9600] hover:bg-[#00FF6F] text-white font-semibold px-5 py-2 rounded-lg shadow">
                        ➕ Nueva Convocatoria
                    </a>
                </div>
            @endif

            {{-- Tabla de convocatorias --}}
            <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#4CB944] text-white">
                        <tr>
                            <th class="py-3 px-4">Título</th>
                            <th class="py-3 px-4">Descripción</th>
                            <th class="py-3 px-4">Fecha de Inicio</th>
                            <th class="py-3 px-4">Fecha de Cierre</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($convocatorias as $convocatoria)
                            <tr class="border-b hover:bg-[#00FF6F]/10 transition">
                                <td class="py-3 px-4 font-semibold text-gray-800">{{ $convocatoria->titulo }}</td>
                                <td class="py-3 px-4 text-gray-600">{{ Str::limit($convocatoria->descripcion, 50) }}</td>
                                <td class="py-3 px-4">{{ $convocatoria->fecha_inicio }}</td>
                                <td class="py-3 px-4">{{ $convocatoria->fecha_cierre }}</td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ route('convocatorias.show', $convocatoria->id) }}"
                                       class="text-[#1C9600] font-semibold hover:underline">Ver</a>
                                    @if(Auth::user()->rol === 'administrador')
                                        | <a href="{{ route('convocatorias.edit', $convocatoria->id) }}"
                                             class="text-[#00FF6F] font-semibold hover:underline">Editar</a>
                                        | <form action="{{ route('convocatorias.destroy', $convocatoria->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 font-semibold hover:underline"
                                                    onclick="return confirm('¿Seguro de eliminar esta convocatoria?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-gray-500">
                                    No hay convocatorias registradas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>