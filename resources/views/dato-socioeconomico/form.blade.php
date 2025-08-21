<div class="space-y-6">
    
    <div>
        <x-input-label for="matricula" :value="__('Matricula')"/>
        <x-text-input id="matricula" name="matricula" type="text" class="mt-1 block w-full" :value="old('matricula', $datoSocioeconomico?->matricula)" autocomplete="matricula" placeholder="Matricula"/>
        <x-input-error class="mt-2" :messages="$errors->get('matricula')"/>
    </div>
    <div>
        <x-input-label for="ingreso_mensual" :value="__('Ingreso Mensual')"/>
        <x-text-input 
            id="ingreso_mensual" 
            name="ingreso_mensual" 
            type="number" 
            step="0.01" 
            class="mt-1 block w-full" 
            :value="old('ingreso_mensual', $datoSocioeconomico?->ingreso_mensual)" 
            autocomplete="ingreso_mensual" 
            placeholder="8500.00"
        />
        <x-input-error class="mt-2" :messages="$errors->get('ingreso_mensual')"/>
    </div>
    <div>
        <x-input-label for="tipo_vivienda" :value="__('Tipo Vivienda')"/>
        <x-text-input id="tipo_vivienda" name="tipo_vivienda" type="text" class="mt-1 block w-full" :value="old('tipo_vivienda', $datoSocioeconomico?->tipo_vivienda)" autocomplete="tipo_vivienda" placeholder="Tipo Vivienda"/>
        <x-input-error class="mt-2" :messages="$errors->get('tipo_vivienda')"/>
    </div>
    <div>
        <x-input-label for="dependiente" :value="__('Dependiente')"/>
        <x-text-input id="dependiente" name="dependiente" type="text" class="mt-1 block w-full" :value="old('dependiente', $datoSocioeconomico?->dependiente)" autocomplete="dependiente" placeholder="Dependiente"/>
        <x-input-error class="mt-2" :messages="$errors->get('dependiente')"/>
    </div>
    <div>
        <x-input-label for="ocupacion_dependiente" :value="__('Ocupacion Dependiente')"/>
        <x-text-input id="ocupacion_dependiente" name="ocupacion_dependiente" type="text" class="mt-1 block w-full" :value="old('ocupacion_dependiente', $datoSocioeconomico?->ocupacion_dependiente)" autocomplete="ocupacion_dependiente" placeholder="Ocupacion Dependiente"/>
        <x-input-error class="mt-2" :messages="$errors->get('ocupacion_dependiente')"/>
    </div>
    <div>
        <x-input-label for="dependientes_economicos" :value="__('Dependientes Economicos')"/>
        <x-text-input id="dependientes_economicos" name="dependientes_economicos" type="text" class="mt-1 block w-full" :value="old('dependientes_economicos', $datoSocioeconomico?->dependientes_economicos)" autocomplete="dependientes_economicos" placeholder="Dependientes Economicos"/>
        <x-input-error class="mt-2" :messages="$errors->get('dependientes_economicos')"/>
    </div>
    <div>
        <x-input-label for="estado_civil" :value="__('Estado Civil')"/>
        <x-text-input id="estado_civil" name="estado_civil" type="text" class="mt-1 block w-full" :value="old('estado_civil', $datoSocioeconomico?->estado_civil)" autocomplete="estado_civil" placeholder="Estado Civil"/>
        <x-input-error class="mt-2" :messages="$errors->get('estado_civil')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button class="justify-center w-full gap-2">
            Submit
        </x-button>
    </div>
</div>