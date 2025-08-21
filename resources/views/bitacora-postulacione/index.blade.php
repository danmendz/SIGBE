<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-green-600 leading-tight">
            {{ __('Bitacora Postulaciones') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-bold text-gray-900">{{ __('Bitacora Postulaciones') }}</h1>
                        <p class="mt-2 text-gray-600 text-sm">Aquí se muestra el registro de todas las {{ __('Bitacora Postulaciones') }}.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-4">
                        <a href="{{ route('bitacora-postulaciones.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 shadow-sm transition-colors">
                            Agregar nueva
                        </a>
                    </div>
                </div>

                <div class="mt-8 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow-sm">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">No</th>
                                <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Postulacion Id</th>
                                <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Usuario Reviso</th>
                                <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Actualizado El</th>
                                <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider">Accion</th>
                                <th class="py-3 px-4 text-left text-xs font-medium uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bitacoraPostulaciones as $bitacoraPostulacione)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4 font-medium text-gray-900">{{ ++$i }}</td>
                                    <td class="py-4 px-4 text-gray-700">{{ $bitacoraPostulacione->postulacion_id }}</td>
                                    <td class="py-4 px-4 text-gray-700">{{ $bitacoraPostulacione->usuario_reviso }}</td>
                                    <td class="py-4 px-4 text-gray-700">{{ $bitacoraPostulacione->actualizado_el }}</td>
                                    <td class="py-4 px-4 text-gray-700">{{ $bitacoraPostulacione->accion }}</td>
                                    <td class="py-4 px-4 flex space-x-2">
                                        <a href="{{ route('bitacora-postulaciones.show', $bitacoraPostulacione->id) }}" class="text-green-600 font-semibold hover:text-green-800 transition-colors">Ver</a>
                                        <a href="{{ route('bitacora-postulaciones.edit', $bitacoraPostulacione->id) }}" class="text-green-600 font-semibold hover:text-green-800 transition-colors">Editar</a>
                                        <form action="{{ route('bitacora-postulaciones.destroy', $bitacoraPostulacione->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este registro?');" class="text-red-600 font-semibold hover:text-red-800 transition-colors">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {!! $bitacoraPostulaciones->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>