<div class="space-y-6">
    
    <div>
        <x-input-label for="estudiante_id" :value="__('Estudiante Id')"/>
        <x-text-input id="estudiante_id" name="estudiante_id" type="text" class="mt-1 block w-full" :value="old('estudiante_id', $becaActiva?->estudiante_id)" autocomplete="estudiante_id" placeholder="Estudiante Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('estudiante_id')"/>
    </div>
    <div>
        <x-input-label for="periodo_beca" :value="__('Periodo Beca')"/>
        <x-text-input id="periodo_beca" name="periodo_beca" type="text" class="mt-1 block w-full" :value="old('periodo_beca', $becaActiva?->periodo_beca)" autocomplete="periodo_beca" placeholder="Periodo Beca"/>
        <x-input-error class="mt-2" :messages="$errors->get('periodo_beca')"/>
    </div>
    <div>
        <x-input-label for="tipo_beca_id" :value="__('Tipo Beca Id')"/>
        <x-text-input id="tipo_beca_id" name="tipo_beca_id" type="text" class="mt-1 block w-full" :value="old('tipo_beca_id', $becaActiva?->tipo_beca_id)" autocomplete="tipo_beca_id" placeholder="Tipo Beca Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('tipo_beca_id')"/>
    </div>
    <div>
        <x-input-label for="fecha_solicitud" :value="__('Fecha Solicitud')"/>
        <x-text-input id="fecha_solicitud" name="fecha_solicitud" type="text" class="mt-1 block w-full" :value="old('fecha_solicitud', $becaActiva?->fecha_solicitud)" autocomplete="fecha_solicitud" placeholder="Fecha Solicitud"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_solicitud')"/>
    </div>
    <div>
        <x-input-label for="fecha_autorizacion" :value="__('Fecha Autorizacion')"/>
        <x-text-input id="fecha_autorizacion" name="fecha_autorizacion" type="text" class="mt-1 block w-full" :value="old('fecha_autorizacion', $becaActiva?->fecha_autorizacion)" autocomplete="fecha_autorizacion" placeholder="Fecha Autorizacion"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_autorizacion')"/>
    </div>
    <div>
        <x-input-label for="fecha_terminacion" :value="__('Fecha Terminacion')"/>
        <x-text-input id="fecha_terminacion" name="fecha_terminacion" type="text" class="mt-1 block w-full" :value="old('fecha_terminacion', $becaActiva?->fecha_terminacion)" autocomplete="fecha_terminacion" placeholder="Fecha Terminacion"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_terminacion')"/>
    </div>
    <div>
        <x-input-label for="motivo_baja" :value="__('Motivo Baja')"/>
        <x-text-input id="motivo_baja" name="motivo_baja" type="text" class="mt-1 block w-full" :value="old('motivo_baja', $becaActiva?->motivo_baja)" autocomplete="motivo_baja" placeholder="Motivo Baja"/>
        <x-input-error class="mt-2" :messages="$errors->get('motivo_baja')"/>
    </div>
    <div>
        <x-input-label for="fecha_baja" :value="__('Fecha Baja')"/>
        <x-text-input id="fecha_baja" name="fecha_baja" type="text" class="mt-1 block w-full" :value="old('fecha_baja', $becaActiva?->fecha_baja)" autocomplete="fecha_baja" placeholder="Fecha Baja"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_baja')"/>
    </div>
    <div>
        <x-input-label for="activa" :value="__('Activa')"/>
        <x-text-input id="activa" name="activa" type="text" class="mt-1 block w-full" :value="old('activa', $becaActiva?->activa)" autocomplete="activa" placeholder="Activa"/>
        <x-input-error class="mt-2" :messages="$errors->get('activa')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>