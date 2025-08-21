<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Datos Socioeconómicos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow-lg sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center justify-between">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">{{ __('Datos Socioeconómicos') }}</h1>
                            <p class="mt-1 text-sm text-gray-600">Listado completo de los datos socioeconómicos registrados.</p>
                        </div>

                        @if(!$yaTieneRegistro)
                            <div class="mt-4 sm:mt-0 sm:flex-none">
                                <a href="{{ route('dato-socioeconomicos.create') }}" 
                                   class="inline-block px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transition">
                                    Agregar nuevo
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                            <thead class="bg-green-600">
                                <tr>
                                    @foreach(['Matricula','Ingreso Mensual','Tipo Vivienda','Dependiente','Ocupacion Dependiente','Dependientes Economicos','Estado Civil'] as $header)
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">
                                            {{ $header }}
                                        </th>
                                    @endforeach
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-semibold text-white uppercase tracking-wide">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($datoSocioeconomicos as $dato)
                                    <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->matricula }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->ingreso_mensual }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->tipo_vivienda }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->dependiente }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->ocupacion_dependiente }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->dependientes_economicos }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-700">{{ $dato->estado_civil }}</td>
                                        <td class="px-3 py-4 text-sm font-medium flex gap-2">
                                            <a href="{{ route('dato-socioeconomicos.show', $dato->id) }}" class="px-2 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">Ver</a>
                                            <a href="{{ route('dato-socioeconomicos.edit', $dato->id) }}" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-500 transition">Editar</a>
                                            <form action="{{ route('dato-socioeconomicos.destroy', $dato->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar?');" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-500 transition">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {!! $datoSocioeconomicos->withQueryString()->links('pagination::tailwind') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>