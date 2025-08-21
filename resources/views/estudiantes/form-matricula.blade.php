    {{-- Formulario por Matrícula --}}
    <div class="bg-gradient-to-r from-green-10 to-green-50 shadow-lg rounded-xl p-6 mb-8 border border-green-200 hover:scale-104 transform transition-all duration-200">
        <div class="flex items-center mb-4 space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.75 12.083 12.083 0 015.84 10.578L12 14z" />
            </svg>
            <h2 class="text-xl font-bold text-green-700">Consulta por Matrícula</h2>
        </div>
        <form method="POST" action="{{ route('consulta.matricula') }}">
            @csrf
            <label class="block font-medium text-green-700 mb-2">Matrícula:</label>
            <input type="text" name="matricula" required 
                   class="border border-green-300 p-3 rounded w-full mb-4 focus:ring-2 focus:ring-green-400 focus:outline-none">

            <button type="submit" 
                    class="bg-green-600 hover:bg-green-700 transition-colors text-white px-6 py-2 rounded shadow">
                Buscar
            </button>
        </form>
    </div>