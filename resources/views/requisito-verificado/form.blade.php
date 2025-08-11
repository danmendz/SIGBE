<div class="space-y-6">
    
    <div>
        <x-input-label for="postulacion_id" :value="__('Postulacion Id')"/>
        <x-text-input id="postulacion_id" name="postulacion_id" type="text" class="mt-1 block w-full" :value="old('postulacion_id', $requisitoVerificado?->postulacion_id)" autocomplete="postulacion_id" placeholder="Postulacion Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('postulacion_id')"/>
    </div>
    <div>
        <x-input-label for="requisito_id" :value="__('Requisito Id')"/>
        <x-text-input id="requisito_id" name="requisito_id" type="text" class="mt-1 block w-full" :value="old('requisito_id', $requisitoVerificado?->requisito_id)" autocomplete="requisito_id" placeholder="Requisito Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('requisito_id')"/>
    </div>
    <div>
        <x-input-label for="cumplido" :value="__('Cumplido')"/>
        <x-text-input id="cumplido" name="cumplido" type="text" class="mt-1 block w-full" :value="old('cumplido', $requisitoVerificado?->cumplido)" autocomplete="cumplido" placeholder="Cumplido"/>
        <x-input-error class="mt-2" :messages="$errors->get('cumplido')"/>
    </div>
    <div>
        <x-input-label for="observaciones" :value="__('Observaciones')"/>
        <x-text-input id="observaciones" name="observaciones" type="text" class="mt-1 block w-full" :value="old('observaciones', $requisitoVerificado?->observaciones)" autocomplete="observaciones" placeholder="Observaciones"/>
        <x-input-error class="mt-2" :messages="$errors->get('observaciones')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button class="justify-center w-full gap-2">
            Submit
        </x-button>
    </div>
</div>