<x-sidebar.sublink
    title="Becas activas"
    href="{{ route('beca-activas.index') }}"
    :active="request()->routeIs('buttons.text')"
/>
<x-sidebar.sublink
    title="Postulaciones"
    href="{{ route('postulacion-becas.index') }}"
    :active="request()->routeIs('buttons.text')"
/>