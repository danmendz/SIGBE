<div class="space-y-6">
    
    <div>
        <x-input-label for="postulacion_id" :value="__('Postulacion Id')"/>
        <x-text-input id="postulacion_id" name="postulacion_id" type="text" class="mt-1 block w-full" :value="old('postulacion_id', $bitacoraPostulacione?->postulacion_id)" autocomplete="postulacion_id" placeholder="Postulacion Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('postulacion_id')"/>
    </div>
    <div>
        <x-input-label for="usuario_reviso" :value="__('Usuario Reviso')"/>
        <x-text-input id="usuario_reviso" name="usuario_reviso" type="text" class="mt-1 block w-full" :value="old('usuario_reviso', $bitacoraPostulacione?->usuario_reviso)" autocomplete="usuario_reviso" placeholder="Usuario Reviso"/>
        <x-input-error class="mt-2" :messages="$errors->get('usuario_reviso')"/>
    </div>
    <div>
        <x-input-label for="actualizado_el" :value="__('Actualizado El')"/>
        <x-text-input id="actualizado_el" name="actualizado_el" type="text" class="mt-1 block w-full" :value="old('actualizado_el', $bitacoraPostulacione?->actualizado_el)" autocomplete="actualizado_el" placeholder="Actualizado El"/>
        <x-input-error class="mt-2" :messages="$errors->get('actualizado_el')"/>
    </div>
    <div>
        <x-input-label for="accion" :value="__('Accion')"/>
        <x-text-input id="accion" name="accion" type="text" class="mt-1 block w-full" :value="old('accion', $bitacoraPostulacione?->accion)" autocomplete="accion" placeholder="Accion"/>
        <x-input-error class="mt-2" :messages="$errors->get('accion')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>