<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aprobar requisitos') }}
        </h2>
    </x-slot>

    <!-- Mensajes del componente -->
    @if ($successMessage)
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ $successMessage }}
        </div>
    @endif

    @if ($errorMessage)
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Errores de validación globales -->
    @if ($errors->has('postulacion'))
        <div class="p-2 mb-4 text-sm text-red-700 bg-red-100 rounded">{{ $errors->first('postulacion') }}</div>
    @endif

    <!-- Requisitos -->
    @foreach ($requisitos as $req)
        <div class="mb-4 p-4 border rounded">
            <h4 class="font-semibold">{{ $req['codigo'] }} - {{ $req['descripcion'] }}</h4>

            <div class="flex items-center gap-4 mb-2">
                <label class="flex items-center gap-2">
                    <input type="radio"
                           wire:model="respuestas.{{ $req['id'] }}.cumplido"
                           value="1"
                           @if($procesado) disabled @endif>
                    <span>Cumple</span>
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                           wire:model="respuestas.{{ $req['id'] }}.cumplido"
                           value="0"
                           @if($procesado) disabled @endif>
                    <span>No cumple</span>
                </label>
            </div>

            @error("respuestas.{$req['id']}.cumplido")
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <div class="mt-2">
                <label for="obs_{{ $req['id'] }}" class="block text-sm font-medium text-gray-700">Observaciones (opcional)</label>
                <textarea id="obs_{{ $req['id'] }}"
                          wire:model="respuestas.{{ $req['id'] }}.observaciones"
                          @if($procesado) disabled @endif
                          class="mt-1 block w-full border rounded-md py-2 px-3 sm:text-sm"></textarea>

                @error("respuestas.{$req['id']}.observaciones")
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    @endforeach

    <!-- Motivo de rechazo -->
    @if($mostrarMotivoRechazo)
        <div class="mb-4 p-4 border rounded bg-yellow-50">
            <label for="motivo_rechazo" class="block text-sm font-medium text-gray-700">Motivo de rechazo (obligatorio)</label>
            <textarea id="motivo_rechazo"
                      wire:model="motivoRechazo"
                      class="mt-1 block w-full border rounded-md py-2 px-3 sm:text-sm"></textarea>
            @error('motivoRechazo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <!-- Botones -->
    <div class="flex gap-4 mt-6">
        @if(!$mostrarMotivoRechazo)
            <button type="button"
                    wire:click="aceptarBeca"
                    wire:loading.attr="disabled"
                    @if($procesado) disabled @endif
                    class="px-4 py-2 rounded bg-green-600 text-white">
                <span wire:loading.remove>Aceptar Beca</span>
                <span wire:loading wire:target="aceptarBeca">Procesando...</span>
            </button>

            <button type="button"
                    wire:click="mostrarFormularioRechazo"
                    wire:loading.attr="disabled"
                    @if($procesado) disabled @endif
                    class="px-4 py-2 rounded bg-red-600 text-white">
                Rechazar Beca
            </button>
        @else
            <button type="button"
                    wire:click="rechazarBeca"
                    wire:loading.attr="disabled"
                    class="px-4 py-2 rounded bg-red-800 text-white">
                <span wire:loading.remove>Confirmar Rechazo</span>
                <span wire:loading wire:target="rechazarBeca">Procesando...</span>
            </button>

            <button type="button"
                    wire:click="cancelarRechazo"
                    class="px-4 py-2 rounded bg-gray-300 text-black">
                Cancelar
            </button>
        @endif
    </div>
</div>  