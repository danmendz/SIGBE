<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-[#4CB944] p-4 rounded">
            {{ __('Dashboard Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Postulaciones -->
            <a href="{{ url('/demo/estudiante/postulaciones') }}" 
               class="bg-[#1C9600] text-white p-6 rounded-2xl shadow-md hover:bg-[#00FF6F] transition">
                Postulaciones
            </a>

            <!-- Documentación -->
            <a href="{{ url('/demo/estudiante/documentacion') }}" 
               class="bg-[#1C9600] text-white p-6 rounded-2xl shadow-md hover:bg-[#00FF6F] transition">
                 Documentación
            </a>

            <!-- Adeudos -->
            <a href="{{ url('/demo/estudiante/adeudos') }}" 
               class="bg-[#1C9600] text-white p-6 rounded-2xl shadow-md hover:bg-[#00FF6F] transition">
                 Adeudos
            </a>
        </div>
    </div>
</x-app-layout>