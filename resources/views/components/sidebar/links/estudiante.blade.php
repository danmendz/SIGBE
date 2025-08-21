<x-sidebar.link title="Becas disponibles" href="{{ route('publicacion-becas.index') }}" />
<x-sidebar.link 
	title="Mis datos socieconomicos" 
	href="{{ route('consultar.datos.socieconomicos', ['matricula' => auth()->user()->matricula] )}}" />
<x-sidebar.link 
    title="Mi información académica" 
    href="{{ route('consultar.informacion.academica', ['matricula' => auth()->user()->matricula] )}}" 
/>