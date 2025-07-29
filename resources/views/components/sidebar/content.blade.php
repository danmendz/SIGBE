<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Información"
        :active="Str::startsWith(request()->route()->uri(), 'buttons')"
    >
        <x-slot name="icon">
            <x-heroicon-o-bars-3-center-left class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <!-- Sidebar sublinks for different role types -->
        @role('revisor')
            @include('components.sidebar.sublinks.revisor')
        @endrole

        @role('estudiante')
            @include('components.sidebar.sublinks.estudiante')
        @endrole

    </x-sidebar.dropdown>

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-gray-500"
    >
        Opciones 
    </div>

    <!-- Links for different role types -->
    @role('revisor')
        @include('components.sidebar.links.revisor')
    @endrole

    @role('estudiante')
        @include('components.sidebar.links.estudiante')
    @endrole

</x-perfect-scrollbar>
