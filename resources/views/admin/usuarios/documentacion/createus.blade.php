<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Registrar Usuario</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            <form action="{{ route('admin.usuarios.store') }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-lg">
                @csrf

                {{-- Nombre --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Nombre</label>
                    <input type="text" name="nombre" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Matrícula --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Matrícula</label>
                    <input type="text" name="matricula" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Correo --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Correo</label>
                    <input type="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Contraseña --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Contraseña</label>
                    <input type="password" name="password" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Rol --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Rol</label>
                    <select name="rol" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        <option value="estudiante">Estudiante</option>
                        <option value="revisor">Revisor</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>

                {{-- Botón --}}
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                            class="bg-[#1C9600] text-white px-6 py-2 rounded-lg hover:bg-[#00FF6F] transition">
                        💾 Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>