<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Editar Usuario</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-lg">
                @csrf
                @method('PUT')

                {{-- Nombre --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Nombre</label>
                    <input type="text" name="nombre" value="{{ $usuario->nombre }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Matrícula --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Matrícula</label>
                    <input type="text" name="matricula" value="{{ $usuario->matricula }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Correo --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Correo</label>
                    <input type="email" name="email" value="{{ $usuario->email }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Rol --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Rol</label>
                    <select name="rol" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        <option value="estudiante" {{ $usuario->rol === 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                        <option value="revisor" {{ $usuario->rol === 'revisor' ? 'selected' : '' }}>Revisor</option>
                        <option value="administrador" {{ $usuario->rol === 'administrador' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>

                {{-- Botón --}}
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-500 transition">
                        💾 Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>