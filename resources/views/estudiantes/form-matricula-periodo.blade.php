    {{-- Formulario por Matrícula y Periodo --}}
    <div class="bg-gradient-to-r from-green-50 to-green-100 shadow-lg rounded-xl p-6 border border-green-200 hover:scale-105 transform transition-all duration-200">
        <div class="flex items-center mb-4 space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />
            </svg>
            <h2 class="text-xl font-bold text-green-700">Consulta por Matrícula y Periodo</h2>
        </div>
        <form method="POST" action="{{ route('consulta.completa') }}">
            @csrf
            <label class="block font-medium text-green-700 mb-1">Matrícula:</label>
            <input type="text" name="matricula" required
                   class="border border-green-300 p-3 rounded w-full mb-3 focus:ring-2 focus:ring-green-400 focus:outline-none">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-medium text-green-700 mb-1">Mes Inicio:</label>
                    <input type="number" name="mes_inicio" min="1" max="12" required
                           class="border border-green-300 p-3 rounded w-full focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>
                <div>
                    <label class="block font-medium text-green-700 mb-1">Mes Fin:</label>
                    <input type="number" name="mes_fin" min="1" max="12" required
                           class="border border-green-300 p-3 rounded w-full focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>
                <div>
                    <label class="block font-medium text-green-700 mb-1">Año:</label>
                    <input type="number" name="anio" required
                           class="border border-green-300 p-3 rounded w-full focus:ring-2 focus:ring-green-400 focus:outline-none">
                </div>
            </div>

            <button type="submit"
                    class="mt-4 bg-green-600 hover:bg-green-700 transition-colors text-white px-6 py-2 rounded shadow">
                Buscar con Periodo
            </button>
        </form>
    </div>