<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-green-600 leading-tight">
            {{ __('Beca Activas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow-lg rounded-xl">
                <div class="w-full">
                    <div class="sm:flex sm:items-center sm:justify-between mb-4">
                        <div>
                            <h1 class="text-lg font-semibold text-green-600">{{ __('Beca Activas') }}</h1>
                            <p class="mt-1 text-sm text-gray-500">Lista de todas las {{ __('Beca Activas') }}.</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-green-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">No</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Estudiante Id</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Periodo Beca</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Tipo Beca Id</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Fecha Solicitud</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Fecha Autorizacion</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Fecha Terminacion</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Motivo Baja</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Fecha Baja</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase text-green-700">Activa</th>
                                    <th class="py-3 px-4"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($becaActivas as $becaActiva)
                                    <tr class="even:bg-gray-50 hover:bg-green-50 transition-colors">
                                        <td class="py-3 px-4 text-sm font-medium text-gray-900">{{ ++$i }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->usuario->matricula }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->periodo->nombre_periodo }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->tipoBeca->nombre }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->fecha_solicitud }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->fecha_autorizacion }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->fecha_terminacion }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->motivo_baja }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->fecha_baja }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-600">{{ $becaActiva->activa }}</td>
                                        <td class="py-3 px-4 text-sm">
                                            <a href="{{ route('beca-activas.show', $becaActiva->id) }}" class="text-green-600 font-semibold hover:text-green-800">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 px-4">
                            {!! $becaActivas->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>