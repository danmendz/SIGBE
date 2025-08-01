<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postulacion Becas') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Postulacion Becas') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Postulacion Becas') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <!--
                            <a type="button" href="{{ route('postulacion-becas.create') }}" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                            -->
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Beca Publicada Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Estudiante Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Postulacion</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Estatus</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Motivo Rechazo</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($postulacionBecas as $postulacionBeca)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $postulacionBeca->publicacionBeca->tipoBeca->nombre }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $postulacionBeca->usuario->matricula }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $postulacionBeca->fecha_postulacion }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $postulacionBeca->estatus }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $postulacionBeca->motivo_rechazo }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">

                                                <!-- Mostrar -->
                                                <a href="{{ route('postulacion-becas.show', $postulacionBeca->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>

                                                @if (auth()->user()->hasRole('revisor'))

                                                    <!-- Inspeccionar información -->
                                                    <form action="{{ route('consultar.informacion.estudiante') }}" method="POST" class="inline-block">
                                                        @csrf
                                                        <input type="hidden" name="matricula" value="{{ $postulacionBeca->usuario->matricula }}">
                                                        <input type="hidden" name="publicacion_beca" value="{{ $postulacionBeca->beca_publicada_id }}">
                                                        <button type="submit" class="text-blue-600 font-bold hover:text-blue-900">
                                                            Inspeccionar
                                                        </button>
                                                    </form>

                                                    <!-- Editar -->
                                                    <a href="{{ route('postulacion-becas.edit', $postulacionBeca->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900 mr-2">{{ __('Edit') }}</a>

                                                    <!-- Aprobar -->
                                                    <form action="{{ route('postulacion-becas.aprobar', $postulacionBeca->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        <button type="submit" class="text-green-600 font-bold hover:text-green-900" onclick="return confirm('¿Estás seguro de aprobar esta postulación?')">
                                                            Aprobar
                                                        </button>
                                                    </form>

                                                    <!-- Rechazar -->
                                                    <form action="{{ route('postulacion-becas.rechazar', $postulacionBeca->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        <input type="text" name="motivo_rechazo" placeholder="Motivo de rechazo" required class="border rounded p-1 text-xs mr-2">
                                                        <button type="submit" class="text-red-600 font-bold hover:text-red-900" onclick="return confirm('¿Estás seguro de rechazar esta postulación?')">
                                                            Rechazar
                                                        </button>
                                                    </form>

                                                    <!-- Eliminar -->
                                                    <form action="{{ route('postulacion-becas.destroy', $postulacionBeca->id) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 font-bold hover:text-red-900" onclick="return confirm('Are you sure to delete?')">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $postulacionBecas->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>