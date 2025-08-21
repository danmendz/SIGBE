<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Publicación de Becas') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                
                <!-- Encabezado -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-900">Lista de Becas Publicadas</h1>
                        <p class="mt-1 text-sm text-gray-600">Consulta y gestiona las publicaciones de becas disponibles.</p>
                    </div>
                </div>

                <!-- Tabla -->
                <div class="mt-6 overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                        <thead class="bg-green-600">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">#</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Tipo de Beca</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Periodo</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Fecha Inicio</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Fecha Fin</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-white uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($publicacionBecas as $publicacionBeca)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ ++$i }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $publicacionBeca->tipoBeca->nombre }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $publicacionBeca->periodo->nombre_periodo }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $publicacionBeca->fecha_inicio }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $publicacionBeca->fecha_fin }}</td>
                                    <td class="px-4 py-3 text-sm text-center space-x-3">
                                        
                                        <!-- Mostrar requisitos -->
                                        <form action="{{ route('consultar.requisitos.beca', $publicacionBeca->id) }}" method="GET" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-800 font-medium">
                                                Ver requisitos
                                            </button>
                                        </form>

                                        <!-- Mostrar detalles -->
                                        <a href="{{ route('publicacion-becas.show', $publicacionBeca->id) }}" class="text-gray-600 hover:text-gray-900 font-medium">
                                            Ver
                                        </a>

                                        <!-- Acciones para revisor -->
                                        @if (auth()->user()->hasRole('revisor'))
                                            <a href="{{ route('publicacion-becas.edit', $publicacionBeca->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                                Editar
                                            </a>
                                            <form action="{{ route('publicacion-becas.destroy', $publicacionBeca->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                                    Eliminar
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-6">
                    {!! $publicacionBecas->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>