<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Nueva Convocatoria</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            <form action="{{ route('admin.convocatorias.store') }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-lg">
                @csrf
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Título</label>
                    <input type="text" name="titulo" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Descripción</label>
                    <textarea name="descripcion" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm" required></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold mb-2">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2">Fecha de Fin</label>
                        <input type="date" name="fecha_fin" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    </div>
                </div>
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