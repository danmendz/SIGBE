<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-[#4CB944] p-4 rounded">
            {{ __('Dashboard Revisor') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Convocatorias -->
            <a href="{{ url('/demo/revisor/convocatorias') }}" 
               class="bg-[#1C9600] text-white p-6 rounded-2xl shadow-md hover:bg-[#00FF6F] transition">
                 Convocatorias
            </a>

            <!-- Documentación -->
            <a href="{{ url('/demo/revisor/documentacion') }}" 
               class="bg-[#1C9600] text-white p-6 rounded-2xl shadow-md hover:bg-[#00FF6F] transition">
                 Documentación
            </a>

            <!-- Reportes -->
            <a href="{{ url('/demo/revisor/reportes') }}" 
               class="bg-[#1C9600] text-white p-6 rounded-2xl shadow-md hover:bg-[#00FF6F] transition">
                 Reportes
            </a>
        </div>
    </div>
</x-app-layout>