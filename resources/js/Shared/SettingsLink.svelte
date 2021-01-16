<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import Icon from '~/Shared/Icon';

    export let route;
    export let params = {};
    export let icon;

    let active = window.route().current(route + '*');
</script>

<InertiaLink
    href="{window.route(route, params)}"
    class="group rounded-md px-3 py-2 flex items-center text-sm font-medium {active
        ? 'bg-gray-50 text-indigo-600 hover:bg-white'
        : 'text-gray-900 hover:text-gray-900 hover:bg-gray-50'} {$$props.class ||
        ''}">
    <Icon
        class="flex-shrink-0 -ml-1 mr-3 {active
            ? 'text-indigo-500'
            : 'text-gray-400 group-hover:text-gray-500'}"
        name="{icon}" />

    <span class="truncate">
        <slot />
    </span>
</InertiaLink>
