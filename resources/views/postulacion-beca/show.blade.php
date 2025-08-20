<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            informacion de estudiante y beca
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 gap-4">

        <div class="bg-white shadow p-4">
            <h3 class="text-lg font-semibold mb-4">Requisitos de la Postulación</h3> 

            <ul>
                <li><strong>Tipo de Beca:</strong> {{ $tipoBeca->nombre ?? 'N/A' }}</li>
                <li><strong>Descripción:</strong> {{ $publicacionBeca->descripcion ?? 'N/A' }}</li>
                <li><strong>Porcentaje de descuento:</strong> {{ $publicacionBeca->porcentaje_descuento ?? 'N/A' }}</li>
                <li><strong>Periodo:</strong> {{ $periodo->nombre_periodo ?? 'N/A' }}</li>
                <li><strong>Fecha Inicio:</strong> {{ $publicacionBeca->fecha_inicio ?? 'N/A' }}</li>
                <li><strong>Fecha Fin:</strong> {{ $publicacionBeca->fecha_fin ?? 'N/A' }}</li>
            </ul>

            <h2 class="text-xl font-bold mt-6 mb-2">Requisitos</h2>
            <ul>
                @forelse($requisitos as $requisito)
                <li><strong>{{ $requisito->codigo }}</strong>: {{ $requisito->descripcion }}</li>
                @empty
                <li>No hay requisitos para esta beca.</li>
                @endforelse
            </ul>  
        </div>

        <div class="bg-white shadow p-4">
            <h3 class="text-lg font-semibold mb-4">Formulario para registrar si cumple</h3>
            @livewire('verificar-requisitos')
        </div>
        
        <div class="col-span-2 bg-white shadow p-4">
            <h3 class="text-lg font-semibold mb-4">Información del estudiante</h3>

            {{-- INFORMACIÓN GENERAL --}}
            @if(isset($datosGenerales))
            <h2 class="text-2xl font-semibold mb-4">Información General</h2>
            <ul class="mb-6">
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
            @endif

            {{-- DOCUMENTACIÓN --}}
            @if(isset($documentacion))
            <h2 class="text-2xl font-semibold mb-4">Documentación</h2>
            <table class="table-auto w-full mb-6 border">
                <thead>
                    <tr>
                        <th class="border px-2">Documento</th>
                        <th class="border px-2">Original</th>
                        <th class="border px-2">Copia</th>
                        <th class="border px-2">Observaciones</th>
                        <th class="border px-2">Notas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentacion as $doc)
                    <tr>
                        <td class="border px-2">{{ $doc['documento'] }}</td>
                        <td class="border px-2">{{ $doc['original'] }}</td>
                        <td class="border px-2">{{ $doc['copia'] }}</td>
                        <td class="border px-2">{{ $doc['observaciones'] }}</td>
                        <td class="border px-2">{{ $doc['notas'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            {{-- ADEUDOS --}}
            @if(isset($adeudos))
            <h2 class="text-2xl font-semibold mb-4">Adeudos</h2>
            <table class="table-auto w-full mb-6 border">
                <thead>
                    <tr>
                        <th class="border px-2">Área</th>
                        <th class="border px-2">Tipo de Adeudo</th>
                        <th class="border px-2">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adeudos as $adeudo)
                    <tr>
                        <td class="border px-2">{{ $adeudo['area'] }}</td>
                        <td class="border px-2">{{ $adeudo['tipo_adeudo'] }}</td>
                        <td class="border px-2">{{ $adeudo['descripcion'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            {{-- CALIFICACIONES --}}
            @if(isset($calificaciones))
            <h2 class="text-2xl font-semibold mb-4">Calificaciones</h2>
            <table class="table-auto w-full mb-6 border text-sm">
                <thead>
                    <tr>
                        <th class="border px-2">Periodo</th>
                        <th class="border px-2">Materia</th>
                        <th class="border px-2">Profesor</th>
                        <th class="border px-2">P1</th>
                        <th class="border px-2">ARO1</th>
                        <th class="border px-2">P2</th>
                        <th class="border px-2">ARO2</th>
                        <th class="border px-2">P3</th>
                        <th class="border px-2">ARO3</th>
                        <th class="border px-2">TI</th>
                        <th class="border px-2">CF</th>
                        <th class="border px-2">ARE1</th>
                        <th class="border px-2">Calificación Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calificaciones as $cal)
                    <tr>
                        <td class="border px-2">{{ $cal['periodo_calificaciones'] }}</td>
                        <td class="border px-2">{{ $cal['materia'] }}</td>
                        <td class="border px-2">{{ $cal['profesor'] }}</td>
                        <td class="border px-2">{{ $cal['p1'] }}</td>
                        <td class="border px-2">{{ $cal['aro1_1'] }}</td>
                        <td class="border px-2">{{ $cal['p2'] }}</td>
                        <td class="border px-2">{{ $cal['aro2_1'] }}</td>
                        <td class="border px-2">{{ $cal['p3'] }}</td>
                        <td class="border px-2">{{ $cal['aro3_1'] }}</td>
                        <td class="border px-2">{{ $cal['ti'] }}</td>
                        <td class="border px-2">{{ $cal['cf'] }}</td>
                        <td class="border px-2">{{ $cal['are1'] }}</td>
                        <td class="border px-2">{{ $cal['calificacion_cuatrimestral'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            {{-- PROMEDIOS --}}
            @if(isset($promedios))
            <h2 class="text-2xl font-semibold mb-4">Promedios</h2>
            <table class="table-auto w-full mb-6 border text-sm">
                <thead>
                    <tr>
                        <th class="border px-2">Matricula</th>
                        <th class="border px-2">Promedio Cuatrimestral</th>
                        <th class="border px-2">Promedio General</th>
                        <th class="border px-2">Periodo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promedios as $prom)
                    <tr>
                        <td class="border px-2">{{ $prom['matricula'] }}</td>
                        <td class="border px-2">{{ $prom['promedio_cuatrimestral'] }}</td>
                        <td class="border px-2">{{ $prom['promedio_general'] }}</td>
                        <td class="border px-2">{{ $prom['periodo_id'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </div>

</x-app-layout>
