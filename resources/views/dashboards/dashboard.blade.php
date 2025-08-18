<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control - SIGBE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="text-2xl font-bold mb-6 text-center text-[#1C9600]">Módulos del Sistema</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Convocatorias -->
                    <a href="{{ route('convocatorias.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Convocatorias
                    </a>

                    <!-- Documentación -->
                    <a href="{{ route('documentacion.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Documentación
                    </a>

                    <!-- Adeudos -->
                    <a href="{{ route('adeudos.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Adeudos
                    </a>

                    <!-- Usuarios -->
                    <a href="{{ route('usuarios.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Usuarios
                    </a>

                    <!-- Postulaciones -->
                    <a href="{{ route('postulaciones.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Postulaciones
                    </a>

                    <!-- Reportes -->
                    <a href="{{ route('reportes.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Reportes
                    </a>

                    <!-- Roles & Permisos -->
                    <a href="{{ route('roles.index') }}" 
                       class="p-6 bg-[#4CB944] text-white rounded-2xl shadow hover:bg-[#1C9600] transition text-center font-semibold">
                        Roles & Permisos
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>