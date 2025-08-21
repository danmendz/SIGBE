<x-app-layout>
	<x-slot name="header">
		<h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-wide">
			Información de la Beca
		</h2>
	</x-slot>

	{{-- Mensajes de sesión --}}
	@if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg shadow-sm" role="alert">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 border border-red-200 rounded-lg shadow-sm" role="alert">
            ⚠️ {{ session('error') }}
        </div>
    @endif

	{{-- Información de la publicación --}}
	<div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100 mb-6">
		<h2 class="text-xl font-semibold text-green-600 mb-4">Información de la Publicación</h2>
		<ul class="space-y-2 text-gray-700">
			<li><span class="font-medium text-gray-900">Tipo de Beca:</span> {{ $tipoBeca->nombre }}</li>
			<li><span class="font-medium text-gray-900">Descripción:</span> {{ $tipoBeca->descripcion }}</li>
			<li><span class="font-medium text-gray-900">Porcentaje de Descuento:</span> {{ $tipoBeca->porcentaje_descuento }}</li>
			<li><span class="font-medium text-gray-900">Periodo:</span> {{ $periodo->nombre_periodo ?? 'N/A' }}</li>
			<li><span class="font-medium text-gray-900">Fecha Inicio:</span> {{ $publicacionBeca->fecha_inicio }}</li>
			<li><span class="font-medium text-gray-900">Fecha Fin:</span> {{ $publicacionBeca->fecha_fin }}</li>
		</ul>
	</div>

	{{-- Requisitos --}}
	<div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100 mb-6">
		<h2 class="text-xl font-semibold text-green-600 mb-4">Requisitos</h2>
		<ul class="list-disc list-inside text-gray-700 space-y-1">
			@forelse($requisitos as $requisito)
				<li><span class="font-semibold text-green-600">{{ $requisito->codigo }}</span>: {{ $requisito->descripcion }}</li>
			@empty
				<li class="text-gray-500">No hay requisitos para esta beca.</li>
			@endforelse
		</ul>
	</div>

	{{-- Botón de postulación --}}
	<div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100">
		<form action="{{ route('postularse.beca', $publicacionBeca->id) }}" method="POST">
			@csrf
			<button 
				type="submit" 
				class="w-full md:w-auto px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:ring-2 focus:ring-green-400 focus:outline-none transition-all duration-200 ease-in-out">
				Postularse a la Beca
			</button>
		</form>
	</div>
</x-app-layout>