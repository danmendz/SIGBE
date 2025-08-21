<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-wide">
            Información de Estudiante y Beca
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 gap-6">

        {{-- Apartado: Requisitos de la Postulación --}}
        <x-card>
            <div class="flex items-start justify-between">
                <h3 class="text-xl font-semibold text-green-600 mb-4">Requisitos de la Postulación</h3>
                {{-- ejemplo de icono pequeño (decorativo) --}}
                <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                </svg>
            </div>

            <ul class="space-y-2 text-gray-700">
                <li><span class="font-medium text-gray-900">Tipo de Beca:</span> {{ $tipoBeca->nombre ?? 'N/A' }}</li>
                <li><span class="font-medium text-gray-900">Descripción:</span> {{ $tipoBeca->descripcion ?? 'N/A' }}</li>
                <li><span class="font-medium text-gray-900">Porcentaje de Descuento:</span> {{ $tipoBeca->porcentaje_descuento ?? 'N/A' }}</li>
                <li><span class="font-medium text-gray-900">Periodo:</span> {{ $periodo->nombre_periodo ?? 'N/A' }}</li>
                <li><span class="font-medium text-gray-900">Fecha Inicio:</span> {{ $publicacionBeca->fecha_inicio ?? 'N/A' }}</li>
                <li><span class="font-medium text-gray-900">Fecha Fin:</span> {{ $publicacionBeca->fecha_fin ?? 'N/A' }}</li>
            </ul>

            <x-section-header title="Requisitos" class="mt-6 mb-2 text-lg font-bold text-gray-800 border-l-0 pl-0" />

            <ul class="list-disc list-inside text-gray-700 space-y-1">
                @forelse($requisitos as $requisito)
                <li><span class="font-semibold text-green-600">{{ $requisito->codigo }}</span>: {{ $requisito->descripcion }}</li>
                @empty
                <li class="text-gray-500">No hay requisitos para esta beca.</li>
                @endforelse
            </ul>
        </x-card>

        {{-- Apartado: Formulario --}}
        <x-card>
            <h3 class="text-xl font-semibold text-green-600 mb-4">Formulario para Registrar Cumplimiento</h3>
            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                @livewire('verificar-requisitos', [], key('verificar-requisitos-' . ($publicacionBeca->id ?? 'default')))
            </div>
        </x-card>

        {{-- Apartado: Información del Estudiante --}}
        <div class="col-span-2">
            <x-card class="mb-6">
                <h3 class="text-xl font-semibold text-green-600 mb-6">Información del Estudiante</h3>

                {{-- INFORMACIÓN GENERAL --}}
                @isset($datosGenerales)
                <x-card class="mb-6 border border-green-200">
                    <x-section-header title="Información General" class="text-2xl font-bold" />
                    <ul class="grid grid-cols-2 gap-3 text-gray-700">
                        <li><strong>Nombre:</strong> {{ $datosGenerales['nombre'] }}</li>
                        <li><strong>Matrícula:</strong> {{ $datosGenerales['matricula'] }}</li>
                        <li><strong>Carrera:</strong> {{ $datosGenerales['carrera'] }}</li>
                        <li><strong>Cuatrimestre:</strong> {{ $datosGenerales['cuatrimestre'] }}</li>
                        <li><strong>Grado:</strong> {{ $datosGenerales['grado'] }}</li>
                        <li><strong>Grupo:</strong> {{ $datosGenerales['grupo'] }}</li>
                        <li><strong>Turno:</strong> {{ $datosGenerales['turno'] }}</li>
                        <li><strong>Periodo Inscrito:</strong> {{ $datosGenerales['periodo_inscrito'] }}</li>
                        <li><strong>Estatus Académico:</strong> {{ $datosGenerales['estatus_academico'] }}</li>
                    </ul>
                </x-card>
                @endisset

                {{-- DOCUMENTACIÓN --}}
                @isset($documentacion)
                <x-card class="mb-6 border border-green-200">
                    <x-section-header title="Documentación" />
                    <div class="overflow-x-auto">
                        <table class="min-w-[720px] table-auto w-full border border-green-200 rounded-lg text-sm" role="table" aria-label="Documentación del estudiante">
                            <thead class="bg-green-600 text-white">
                                <tr>
                                    <th scope="col" class="px-3 py-2 text-left">Documento</th>
                                    <th scope="col" class="px-3 py-2 text-left">Original</th>
                                    <th scope="col" class="px-3 py-2 text-left">Copia</th>
                                    <th scope="col" class="px-3 py-2 text-left">Observaciones</th>
                                    <th scope="col" class="px-3 py-2 text-left">Notas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documentacion as $doc)
                                <tr class="odd:bg-gray-50 even:bg-white hover:bg-green-50">
                                    <td class="px-3 py-2 border">{{ $doc['documento'] }}</td>

                                    <td class="px-3 py-2 border text-center">
                                        @if(!empty($doc['original']))
                                        {{-- check icon --}}
                                        <svg class="inline w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414-1.414L8 11.172 4.707 7.879a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="sr-only">Sí</span>
                                        @else
                                        {{-- x icon --}}
                                        <svg class="inline w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 8.586L4.293 2.879A1 1 0 002.879 4.293L8.586 10l-5.707 5.707a1 1 0 101.414 1.414L10 11.414l5.707 5.707a1 1 0 001.414-1.414L11.414 10l5.707-5.707A1 1 0 0015.707 2.879L10 8.586z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="sr-only">No</span>
                                        @endif
                                    </td>

                                    <td class="px-3 py-2 border text-center">
                                        @if(!empty($doc['copia']))
                                        <svg class="inline w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414-1.414L8 11.172 4.707 7.879a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="sr-only">Sí</span>
                                        @else
                                        <svg class="inline w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 8.586L4.293 2.879A1 1 0 002.879 4.293L8.586 10l-5.707 5.707a1 1 0 101.414 1.414L10 11.414l5.707 5.707a1 1 0 001.414-1.414L11.414 10l5.707-5.707A1 1 0 0015.707 2.879L10 8.586z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="sr-only">No</span>
                                        @endif
                                    </td>

                                    <td class="px-3 py-2 border">{{ $doc['observaciones'] }}</td>
                                    <td class="px-3 py-2 border">{{ $doc['notas'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-card>
                @endisset

                {{-- ADEUDOS --}}
                @isset($adeudos)
                <x-card class="mb-6 border border-green-200">
                    <x-section-header title="Adeudos" />
                    <div class="overflow-x-auto">
                        <table class="min-w-[600px] table-auto w-full border border-green-200 rounded-lg text-sm" role="table" aria-label="Adeudos del estudiante">
                            <thead class="bg-green-600 text-white">
                                <tr>
                                    <th scope="col" class="px-3 py-2 text-left">Área</th>
                                    <th scope="col" class="px-3 py-2 text-left">Tipo de Adeudo</th>
                                    <th scope="col" class="px-3 py-2 text-left">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adeudos as $adeudo)
                                <tr class="odd:bg-gray-50 even:bg-white hover:bg-green-50">
                                    <td class="px-3 py-2 border">{{ $adeudo['area'] }}</td>
                                    <td class="px-3 py-2 border">{{ $adeudo['tipo_adeudo'] }}</td>
                                    <td class="px-3 py-2 border">{{ $adeudo['descripcion'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-card>
                @endisset

                {{-- CALIFICACIONES --}}
                @isset($calificaciones)
                <x-card class="mb-6 border border-green-200">
                    <x-section-header title="Calificaciones" />
                    <div class="overflow-x-auto">
                        <table class="min-w-[1000px] table-auto w-full border border-green-200 rounded-lg text-sm" role="table" aria-label="Calificaciones">
                            <thead class="bg-green-600 text-white">
                                <tr>
                                    <th scope="col" class="px-3 py-2">Periodo</th>
                                    <th scope="col" class="px-3 py-2">Materia</th>
                                    <th scope="col" class="px-3 py-2">Profesor</th>
                                    <th scope="col" class="px-3 py-2">P1</th>
                                    <th scope="col" class="px-3 py-2">ARO1</th>
                                    <th scope="col" class="px-3 py-2">P2</th>
                                    <th scope="col" class="px-3 py-2">ARO2</th>
                                    <th scope="col" class="px-3 py-2">P3</th>
                                    <th scope="col" class="px-3 py-2">ARO3</th>
                                    <th scope="col" class="px-3 py-2">TI</th>
                                    <th scope="col" class="px-3 py-2">CF</th>
                                    <th scope="col" class="px-3 py-2">ARE1</th>
                                    <th scope="col" class="px-3 py-2">Calificación Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calificaciones as $cal)
                                <tr class="odd:bg-gray-50 even:bg-white hover:bg-green-50">
                                    <td class="px-3 py-2 border">{{ $cal['periodo_calificaciones'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['materia'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['profesor'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['p1'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['aro1_1'] ?? '-' }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['p2'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['aro2_1'] ?? '-' }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['p3'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['aro3_1'] ?? '-' }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['ti'] }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['cf'] ?? '-' }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['are1'] ?? '-' }}</td>
                                    <td class="px-3 py-2 border">{{ $cal['calificacion_cuatrimestral'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Si $calificaciones tiene paginación, mostrar links --}}
                    @if($calificaciones instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-4">
                        {{ $calificaciones->links() }}
                    </div>
                    @endif

                </x-card>
                @endisset

                {{-- PROMEDIOS --}}
                @isset($promedios)
                <x-card class="border border-green-200">
                    <x-section-header title="Promedios" />
                    <div class="overflow-x-auto">
                        <table class="min-w-[480px] table-auto w-full border border-green-200 rounded-lg text-sm" role="table" aria-label="Promedios">
                            <thead class="bg-green-600 text-white">
                                <tr>
                                    <th scope="col" class="px-3 py-2">Periodo</th>
                                    <th scope="col" class="px-3 py-2">Promedio Cuatrimestral</th>
                                    <th scope="col" class="px-3 py-2">Promedio General</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promedios as $prom)
                                <tr class="odd:bg-gray-50 even:bg-white hover:bg-green-50">
                                    <td class="px-3 py-2 border">{{ $prom['periodo'] }}</td>
                                    <td class="px-3 py-2 border">{{ $prom['promedio_cuatrimestral'] }}</td>
                                    <td class="px-3 py-2 border">{{ $prom['promedio_general'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-card>
                @endisset

            </x-card>
        </div>

    </div>
</x-app-layout>
