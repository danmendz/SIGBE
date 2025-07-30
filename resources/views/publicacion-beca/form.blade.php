<div class="space-y-6">
    
    <div>
        <x-input-label for="tipo_beca_id" :value="__('Tipo Beca Id')"/>
        <x-text-input id="tipo_beca_id" name="tipo_beca_id" type="text" class="mt-1 block w-full" :value="old('tipo_beca_id', $publicacionBeca?->tipo_beca_id)" autocomplete="tipo_beca_id" placeholder="Tipo Beca Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('tipo_beca_id')"/>
    </div>
    <div>
        <x-input-label for="periodo_id" :value="__('Periodo Id')"/>
        <x-text-input id="periodo_id" name="periodo_id" type="text" class="mt-1 block w-full" :value="old('periodo_id', $publicacionBeca?->periodo_id)" autocomplete="periodo_id" placeholder="Periodo Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('periodo_id')"/>
    </div>
    <div>
        <x-input-label for="fecha_inicio" :value="__('Fecha Inicio')"/>
        <x-text-input id="fecha_inicio" name="fecha_inicio" type="text" class="mt-1 block w-full" :value="old('fecha_inicio', $publicacionBeca?->fecha_inicio)" autocomplete="fecha_inicio" placeholder="Fecha Inicio"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_inicio')"/>
    </div>
    <div>
        <x-input-label for="fecha_fin" :value="__('Fecha Fin')"/>
        <x-text-input id="fecha_fin" name="fecha_fin" type="text" class="mt-1 block w-full" :value="old('fecha_fin', $publicacionBeca?->fecha_fin)" autocomplete="fecha_fin" placeholder="Fecha Fin"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_fin')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button class="justify-center w-full gap-2">
            Submit
        </x-button>
    </div>
</div>