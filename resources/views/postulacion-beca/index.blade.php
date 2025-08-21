<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-green-600 leading-tight tracking-wide">
            {{ __('Postulación Becas') }}
        </h2>
    </x-slot>

    {{-- Alertas --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 border-l-4 border-green-600 rounded-lg shadow-md" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 border-l-4 border-red-600 rounded-lg shadow-md" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Contenedor principal --}}
            <div class="p-6 bg-white shadow-xl sm:rounded-2xl border border-green-100">
                <div class="w-full">

                    {{-- Título y descripción --}}
                    <div class="sm:flex sm:items-center sm:justify-between mb-6">
                        <div class="sm:flex-auto">
                            <h1 class="text-2xl font-semibold text-gray-900">{{ __('Postulación Becas') }}</h1>
                            <p class="mt-2 text-sm text-gray-500">Listado completo de todas las postulaciones a becas.</p>
                        </div>
                    </div>

                    {{-- Tabla de postulaciones --}}
                    <div class="overflow-x-auto rounded-lg border border-green-200 shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-green-600">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">No</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Beca Publicada</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Estudiante</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Fecha</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Estatus</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Motivo Rechazo</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($postulacionBecas as $postulacionBeca)
                                    <tr class="even:bg-green-50 hover:bg-green-100 transition duration-200">
                                        <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ ++$i }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $postulacionBeca->publicacionBeca->tipoBeca->nombre }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $postulacionBeca->usuario->matricula }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $postulacionBeca->fecha_postulacion }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $postulacionBeca->estatus }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $postulacionBeca->motivo_rechazo }}</td>
                                        <td class="px-4 py-3 space-x-2 text-sm font-medium flex flex-wrap gap-2">

                                            {{-- Botones de acción --}}
                                            {{-- <a href="{{ route('postulacion-becas.show', $postulacionBeca->id) }}" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">Ver</a> --}}

                                            @if (auth()->user()->hasRole('revisor'))
                                                <form action="{{ route('consultar.informacion.estudiante') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="matricula" value="{{ $postulacionBeca->usuario->matricula }}">
                                                    <input type="hidden" name="publicacion_beca" value="{{ $postulacionBeca->beca_publicada_id }}">
                                                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Inspeccionar</button>
                                                </form>

                                                <a href="{{ route('postulacion-becas.edit', $postulacionBeca->id) }}" class="px-2 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Editar</a>

                                                <form action="{{ route('postulacion-becas.aprobar', $postulacionBeca->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition" onclick="return confirm('¿Estás seguro de aprobar esta postulación?')">Aprobar</button>
                                                </form>

                                                <form action="{{ route('postulacion-becas.rechazar', $postulacionBeca->id) }}" method="POST" class="flex gap-1 items-center">
                                                    @csrf
                                                    <input type="text" name="motivo_rechazo" placeholder="Motivo de rechazo" required class="border border-gray-300 rounded px-2 py-1 text-xs focus:ring-1 focus:ring-green-400 focus:border-green-400">
                                                    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition" onclick="return confirm('¿Estás seguro de rechazar esta postulación?')">Rechazar</button>
                                                </form>

                                                <form action="{{ route('postulacion-becas.destroy', $postulacionBeca->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Paginación --}}
                        <div class="mt-6 px-4">
                            {!! $postulacionBecas->withQueryString()->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>