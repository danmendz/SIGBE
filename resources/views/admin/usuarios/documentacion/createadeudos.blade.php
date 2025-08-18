<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#4CB944] text-white px-6 py-4 rounded-t-lg">
            <h2 class="font-semibold text-xl">Registrar Adeudo</h2>
        </div>
    </x-slot>

    <div class="py-8 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            <form action="{{ route('admin.adeudos.store') }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-lg">
                @csrf

                {{-- Selección de estudiante --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Estudiante</label>
                    <select name="usuario_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        <option value="">-- Selecciona un estudiante --</option>
                        @foreach($estudiantes as $est)
                            <option value="{{ $est->id }}">{{ $est->nombre }} ({{ $est->matricula }})</option>
                        @endforeach
                    </select>
                </div>

                {{-- Concepto --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Concepto</label>
                    <input type="text" name="concepto" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Monto --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Monto</label>
                    <input type="number" name="monto" step="0.01" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Estatus --}}
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Estatus</label>
                    <select name="pagado" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        <option value="0">Pendiente</option>
                        <option value="1">Pagado</option>
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