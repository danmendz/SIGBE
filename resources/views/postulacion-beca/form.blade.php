<div class="space-y-6">
    
    <div>
        <x-input-label for="beca_publicada_id" :value="__('Beca Publicada Id')"/>
        <x-text-input id="beca_publicada_id" name="beca_publicada_id" type="text" class="mt-1 block w-full" :value="old('beca_publicada_id', $postulacionBeca?->beca_publicada_id)" autocomplete="beca_publicada_id" placeholder="Beca Publicada Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('beca_publicada_id')"/>
    </div>
    <div>
        <x-input-label for="estudiante_id" :value="__('Estudiante Id')"/>
        <x-text-input id="estudiante_id" name="estudiante_id" type="text" class="mt-1 block w-full" :value="old('estudiante_id', $postulacionBeca?->estudiante_id)" autocomplete="estudiante_id" placeholder="Estudiante Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('estudiante_id')"/>
    </div>
    <div>
        <x-input-label for="fecha_postulacion" :value="__('Fecha Postulacion')"/>
        <x-text-input id="fecha_postulacion" name="fecha_postulacion" type="text" class="mt-1 block w-full" :value="old('fecha_postulacion', $postulacionBeca?->fecha_postulacion)" autocomplete="fecha_postulacion" placeholder="Fecha Postulacion"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_postulacion')"/>
    </div>
    <div>
        <x-input-label for="estatus" :value="__('Estatus')"/>
        <x-text-input id="estatus" name="estatus" type="text" class="mt-1 block w-full" :value="old('estatus', $postulacionBeca?->estatus)" autocomplete="estatus" placeholder="Estatus"/>
        <x-input-error class="mt-2" :messages="$errors->get('estatus')"/>
    </div>
    <div>
        <x-input-label for="motivo_rechazo" :value="__('Motivo Rechazo')"/>
        <x-text-input id="motivo_rechazo" name="motivo_rechazo" type="text" class="mt-1 block w-full" :value="old('motivo_rechazo', $postulacionBeca?->motivo_rechazo)" autocomplete="motivo_rechazo" placeholder="Motivo Rechazo"/>
        <x-input-error class="mt-2" :messages="$errors->get('motivo_rechazo')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button class="justify-center w-full gap-2">
            Submit
        </x-button>
    </div>
</div>