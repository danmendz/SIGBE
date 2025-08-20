<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicacion Becas') }}
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
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Publicacion Becas') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Publicacion Becas') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <!--
                            <a type="button" href="{{ route('publicacion-becas.create') }}" class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
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
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Tipo Beca Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Periodo Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Inicio</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Fin</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($publicacionBecas as $publicacionBeca)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $publicacionBeca->tipoBeca->nombre }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $publicacionBeca->periodo->nombre_periodo }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $publicacionBeca->fecha_inicio }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $publicacionBeca->fecha_fin }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                
                                                <form action="{{ route('consultar.requisitos.beca', $publicacionBeca->id) }}" method="GET" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="text-green-600 font-bold hover:text-green-900">
                                                        Mostrar requisitos de beca
                                                    </button>
                                                </form>

                                                <form action="{{ route('postularse.beca', $publicacionBeca->id) }}" method="POST">
                                                    @csrf
                                                    <a href="{{ route('publicacion-becas.show', $publicacionBeca->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>

                                                    @if (auth()->user()->hasRole('revisor'))
                                                        <a href="{{ route('publicacion-becas.edit', $publicacionBeca->id) }}" class="text-blue-600 font-bold hover:text-blue-900 mr-2">{{ __('Edit') }}</a>
                                                        <form action="{{ route('publicacion-becas.destroy', $publicacionBeca->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 font-bold hover:text-red-900">{{ __('Delete') }}</button>
                                                        </form>
                                                    @endif
                                                
                                                </form>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $publicacionBecas->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>