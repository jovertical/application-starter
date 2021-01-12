<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';

    export let route;

    let active = window.route().current(route + '*');
</script>

<InertiaLink
    href="{window.route(route)}"
    class="block px-3 py-2 rounded-md font-medium {active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'} {$$props.class}"
>
    <slot />
</InertiaLink>
