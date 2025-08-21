<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dato Socioeconomicos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Dato Socioeconomicos') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Dato Socioeconomicos') }}.</p>
                        </div>
                        @if(!$yaTieneRegistro)
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a type="button" 
                                   href="{{ route('dato-socioeconomicos.create') }}" 
                                   class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Add new
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>

									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Matricula</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Ingreso Mensual</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Tipo Vivienda</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Dependiente</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Ocupacion Dependiente</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Dependientes Economicos</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Estado Civil</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($datoSocioeconomicos as $datoSocioeconomico)
                                        <tr class="even:bg-gray-50">
                                            
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->matricula }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->ingreso_mensual }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->tipo_vivienda }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->dependiente }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->ocupacion_dependiente }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->dependientes_economicos }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $datoSocioeconomico->estado_civil }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('dato-socioeconomicos.destroy', $datoSocioeconomico->id) }}" method="POST">
                                                    <a href="{{ route('dato-socioeconomicos.show', $datoSocioeconomico->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                    <a href="{{ route('dato-socioeconomicos.edit', $datoSocioeconomico->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('dato-socioeconomicos.destroy', $datoSocioeconomico->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $datoSocioeconomicos->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>