<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Mi Perfil') }}
        </h2>
    </x-slot>

    <div class="py-10 px-6">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-6">
            
            <div class="flex items-center space-x-4 mb-6">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nombre }}" 
                     class="w-20 h-20 rounded-full border-4 border-[#1C9600]" alt="avatar">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">{{ Auth::user()->nombre }}</h3>
                    <p class="text-gray-600">Rol: {{ Auth::user()->rol }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('perfil.update') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div>
                    <label class="block text-gray-700">Nombre</label>
                    <input type="text" name="nombre" value="{{ Auth::user()->nombre }}" 
                           class="w-full border rounded-lg p-2">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700">Correo electrónico</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" 
                           class="w-full border rounded-lg p-2">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-gray-700">Contraseña (opcional)</label>
                    <input type="password" name="password" placeholder="Nueva contraseña" 
                           class="w-full border rounded-lg p-2">
                </div>

                <button type="submit" class="bg-[#1C9600] hover:bg-[#00FF6F] text-white px-4 py-2 rounded-lg">
                    Guardar cambios
                </button>
            </form>
        </div>
    </div>
</x-app-layout>