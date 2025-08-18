<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Reportes del Sistema') }}
        </h2>
    </x-slot>

    <div class="py-10 px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Reporte Becas -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-[#1C9600]">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Becas otorgadas</h3>
                <p class="text-gray-600">Resumen de becas activas y completadas.</p>
                <a href="#" class="text-[#1C9600] font-semibold hover:underline">Ver más</a>
            </div>

            <!-- Reporte Estudiantes -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-[#00FF6F]">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Estudiantes</h3>
                <p class="text-gray-600">Cantidad de estudiantes registrados en el sistema.</p>
                <a href="#" class="text-[#1C9600] font-semibold hover:underline">Ver más</a>
            </div>

            <!-- Reporte Convocatorias -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-[#4CB944]">
                <h3 class="text-lg font-bold text-gray-800 mb-2"> Convocatorias</h3>
                <p class="text-gray-600">Convocatorias publicadas y su estatus.</p>
                <a href="#" class="text-[#1C9600] font-semibold hover:underline">Ver más</a>
            </div>
        </div>
    </div>
</x-app-layout>