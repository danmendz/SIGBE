<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Gestión de Adeudos</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Título --}}
            <div class="mb-6 text-center">
                <h3 class="text-3xl font-bold text-gray-800">Control de Adeudos Estudiantiles</h3>
                <p class="text-gray-600">Administra los adeudos de los estudiantes registrados en el sistema.</p>
            </div>

            {{-- Botón para registrar adeudo --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.adeudos.create') }}"
                   class="bg-[#1C9600] text-white px-4 py-2 rounded-lg hover:bg-[#00FF6F] transition">
                    ➕ Registrar Adeudo
                </a>
            </div>

            {{-- Tabla de adeudos --}}
            <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#1C9600] text-white">
                        <tr>
                            <th class="py-3 px-4">Estudiante</th>
                            <th class="py-3 px-4">Matrícula</th>
                            <th class="py-3 px-4">Concepto</th>
                            <th class="py-3 px-4">Monto</th>
                            <th class="py-3 px-4">Estatus</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($adeudos as $adeudo)
                            <tr class="border-b hover:bg-[#00FF6F]/10 transition">
                                <td class="py-3 px-4 font-semibold text-gray-800">{{ $adeudo->usuario->nombre }}</td>
                                <td class="py-3 px-4">{{ $adeudo->usuario->matricula }}</td>
                                <td class="py-3 px-4">{{ $adeudo->concepto }}</td>
                                <td class="py-3 px-4 font-semibold text-red-600">${{ number_format($adeudo->monto, 2) }}</td>
                                <td class="py-3 px-4">
                                    @if($adeudo->pagado)
                                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded-lg">Pagado</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded-lg">Pendiente</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <form action="{{ route('admin.adeudos.destroy', $adeudo->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-500 transition">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-500">
                                    No hay adeudos registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>