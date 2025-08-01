@if($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2 class="text-xl font-semibold mb-4">Consulta por Matrícula</h2>
<form method="POST" action="{{ route('consulta.matricula') }}" class="mb-8">
    @csrf
    <label class="block">Matrícula:</label>
    <input type="text" name="matricula" required class="border p-2 rounded w-full mb-2">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Buscar</button>
</form>

<hr class="my-6">

<h2 class="text-xl font-semibold mb-4">Consulta por Matrícula y Periodo</h2>
<form method="POST" action="{{ route('consulta.completa') }}">
    @csrf
    <label class="block">Matrícula:</label>
    <input type="text" name="matricula" required class="border p-2 rounded w-full mb-2">

    <label class="block mt-2">Mes Inicio:</label>
    <input type="number" name="mes_inicio" min="1" max="12" required class="border p-2 rounded w-full mb-2">

    <label class="block mt-2">Mes Fin:</label>
    <input type="number" name="mes_fin" min="1" max="12" required class="border p-2 rounded w-full mb-2">

    <label class="block mt-2">Año:</label>
    <input type="number" name="anio" required class="border p-2 rounded w-full mb-2">

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Buscar con Periodo</button>
</form>