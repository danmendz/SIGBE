<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Gestión de Roles y Permisos') }}
        </h2>
    </x-slot>

    <div class="py-10 px-6">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl p-6">
            
            <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-[#1C9600] text-white">
                    <tr>
                        <th class="p-3 text-left">Usuario</th>
                        <th class="p-3 text-left">Rol</th>
                        <th class="p-3 text-left">Permisos</th>
                        <th class="p-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="p-3">Juan Pérez</td>
                        <td class="p-3">Estudiante</td>
                        <td class="p-3">Solicitar beca, ver adeudos</td>
                        <td class="p-3">
                            <a href="#" class="text-[#1C9600] hover:underline">Editar</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-3">María López</td>
                        <td class="p-3">Revisor</td>
                        <td class="p-3">Validar docs, revisar becas</td>
                        <td class="p-3">
                            <a href="#" class="text-[#1C9600] hover:underline">Editar</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-3">Carlos Ramírez</td>
                        <td class="p-3">Administrador</td>
                        <td class="p-3">Control total</td>
                        <td class="p-3">
                            <a href="#" class="text-[#1C9600] hover:underline">Editar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>