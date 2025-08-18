<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Gestión de Usuarios</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Título --}}
            <div class="mb-6 text-center">
                <h3 class="text-3xl font-bold text-gray-800">Usuarios Registrados</h3>
                <p class="text-gray-600">Administra los estudiantes, revisores y administradores del sistema.</p>
            </div>

            {{-- Botón para registrar usuario --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.usuarios.create') }}"
                   class="bg-[#1C9600] text-white px-4 py-2 rounded-lg hover:bg-[#00FF6F] transition">
                    ➕ Registrar Usuario
                </a>
            </div>

            {{-- Tabla de usuarios --}}
            <div class="overflow-x-auto bg-gray-50 rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#1C9600] text-white">
                        <tr>
                            <th class="py-3 px-4">Nombre</th>
                            <th class="py-3 px-4">Matrícula</th>
                            <th class="py-3 px-4">Correo</th>
                            <th class="py-3 px-4">Rol</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                            <tr class="border-b hover:bg-[#00FF6F]/10 transition">
                                <td class="py-3 px-4 font-semibold text-gray-800">{{ $usuario->nombre }}</td>
                                <td class="py-3 px-4">{{ $usuario->matricula }}</td>
                                <td class="py-3 px-4">{{ $usuario->email }}</td>
                                <td class="py-3 px-4">
                                    @if($usuario->rol === 'administrador')
                                        <span class="bg-purple-200 text-purple-800 px-2 py-1 rounded-lg">Administrador</span>
                                    @elseif($usuario->rol === 'revisor')
                                        <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded-lg">Revisor</span>
                                    @else
                                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded-lg">Estudiante</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}"
                                       class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-500 transition">
                                        ✏️ Editar
                                    </a>
                                    <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
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
                                <td colspan="5" class="py-6 text-center text-gray-500">
                                    No hay usuarios registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>