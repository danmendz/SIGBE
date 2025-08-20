<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			informacion de la beca
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

	<form action="{{ route('postularse.beca', $publicacionBeca->id) }}" method="POST">
		@csrf

		<button type="submit" class="text-blue-600 font-bold hover:text-blue-900">
			Postularse a beca
		</button>

	</form>    
</x-app-layout>	
