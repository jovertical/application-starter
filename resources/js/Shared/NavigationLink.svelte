<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import cx from '~/directives/cx';

    export let route;

    let active = window.route().current(route + '*');
</script>

<InertiaLink href="{window.route(route)}">
    <span
        class="block px-3 py-2 rounded-md font-medium {$$props.class}"
        use:cx="{{
            'bg-gray-900 text-white': active,
            'text-gray-300 hover:bg-gray-700 hover:text-white': !active,
        }}">
        <slot />
    </span>
</InertiaLink>
