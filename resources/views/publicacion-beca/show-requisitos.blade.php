<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            informacion de la beca
        </h2>
    </x-slot>
	<h2 class="text-xl font-bold mb-4">Información de la Publicación</h2>
	<ul>
	    <li><strong>Tipo de Beca:</strong> {{ $tipoBeca->nombre }}</li>
	    <li><strong>Descripción:</strong> {{ $tipoBeca->descripcion }}</li>
	    <li><strong>Porcentaje de descuento:</strong> {{ $tipoBeca->porcentaje_descuento }}</li>
	    <li><strong>Periodo:</strong> {{ $periodo->nombre_periodo ?? 'N/A' }}</li>
	    <li><strong>Fecha Inicio:</strong> {{ $publicacionBeca->fecha_inicio }}</li>
	    <li><strong>Fecha Fin:</strong> {{ $publicacionBeca->fecha_fin }}</li>
	</ul>

	<h2 class="text-xl font-bold mt-6 mb-2">Requisitos</h2>
	<ul>
	    @forelse($requisitos as $requisito)
	        <li><strong>{{ $requisito->codigo }}</strong>: {{ $requisito->descripcion }}</li>
	    @empty
	        <li>No hay requisitos para esta beca.</li>
	    @endforelse
	</ul>
</x-app-layout>	
