<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">📊 Panel de Revisor</h2>
        </div>
    </x-slot>

    <div class="py-10 bg-white min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            {{-- Bienvenida --}}
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Bienvenido, Revisor 👨‍💻</h3>
                <p class="text-gray-600 mt-2">Desde aquí puedes gestionar y dar seguimiento a las postulaciones, convocatorias y documentos de los estudiantes.</p>
            </div>

            {{-- Tarjetas de accesos rápidos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Postulaciones --}}
                <a href="{{ route('revisor.postulaciones.index') }}"
                   class="bg-[#1C9600] text-white rounded-xl shadow-lg hover:bg-[#00FF6F] hover:text-gray-900 transition p-6 flex flex-col items-center">
                    <span class="text-4xl mb-3">📋</span>
                    <h4 class="font-bold text-lg">Postulaciones</h4>
                    <p class="text-sm text-center">Revisa y evalúa las solicitudes enviadas por los estudiantes.</p>
                </a>

                {{-- Documentación --}}
                <a href="{{ route('revisor.documentacion.index') }}"
                   class="bg-white border-2 border-[#4CB944] text-gray-800 rounded-xl shadow hover:bg-[#4CB944] hover:text-white transition p-6 flex flex-col items-center">
                    <span class="text-4xl mb-3">📑</span>
                    <h4 class="font-bold text-lg">Documentación</h4>
                    <p class="text-sm text-center">Verifica y valida los documentos cargados por los estudiantes.</p>
                </a>

                {{-- Convocatorias --}}
                <a href="{{ route('revisor.convocatorias.index') }}"
                   class="bg-[#00FF6F] text-gray-900 rounded-xl shadow-lg hover:bg-[#1C9600] hover:text-white transition p-6 flex flex-col items-center">
                    <span class="text-4xl mb-3">📢</span>
                    <h4 class="font-bold text-lg">Convocatorias</h4>
                    <p class="text-sm text-center">Consulta y gestiona las convocatorias de becas vigentes.</p>
                </a>

                {{-- Adeudos --}}
                <a href="{{ route('revisor.adeudos.index') }}"
                   class="bg-white border-2 border-[#1C9600] text-gray-800 rounded-xl shadow hover:bg-[#1C9600] hover:text-white transition p-6 flex flex-col items-center">
                    <span class="text-4xl mb-3"></span>
                    <h4 class="font-bold text-lg">Adeudos</h4>
                    <p class="text-sm text-center">Revisa si los estudiantes cumplen con sus requisitos financieros.</p>
                </a>

                {{-- Usuarios --}}
                <a href="{{ route('revisor.usuarios.index') }}"
                   class="bg-[#4CB944] text-white rounded-xl shadow-lg hover:bg-[#00FF6F] hover:text-gray-900 transition p-6 flex flex-col items-center">
                    <span class="text-4xl mb-3">👥</span>
                    <h4 class="font-bold text-lg">Usuarios</h4>
                    <p class="text-sm text-center">Consulta la información de estudiantes y otros usuarios.</p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>