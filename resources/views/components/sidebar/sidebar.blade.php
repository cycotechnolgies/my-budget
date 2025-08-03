<x-sidebar.overlay />

<aside
    class="fixed inset-y-0 z-20 flex flex-col py-4 space-y-6 bg-white shadow-lg dark:bg-dark-eval-1"
    :class="{
        'w-64': isSidebarOpen || isSidebarHovered,
        'w-16': !isSidebarOpen && !isSidebarHovered,
        'translate-x-0': isSidebarOpen || window.innerWidth >= 768,
        '-translate-x-full': !isSidebarOpen && window.innerWidth < 768
    }"
    style="transition-property: width, transform; transition-duration: 150ms;"
    x-on:mouseenter="handleSidebarHover(true)"
    x-on:mouseleave="handleSidebarHover(false)"
>
    <x-sidebar.header />

    <x-sidebar.content />

    <x-sidebar.footer />
</aside>
