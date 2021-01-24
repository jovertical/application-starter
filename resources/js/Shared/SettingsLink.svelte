<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import cx from '~/directives/cx';
    import Icon from '~/Shared/Icon';

    export let route;
    export let params = {};
    export let icon;

    let active = window.route().current(route + '*');
</script>

<InertiaLink href="{window.route(route, params)}">
    <span
        class="group rounded-md px-3 py-2 flex items-center text-sm font-medium"
        use:cx="{{
            'bg-gray-50 text-indigo-600 hover:bg-white': active,
            'text-gray-900 hover:text-gray-900 hover:bg-gray-50': !active,
        }}">
        <span
            class="flex-shrink-0 -ml-1 mr-3"
            use:cx="{{
                'text-indigo-500': active,
                'text-gray-400 group-hover:text-gray-500': !active,
            }}">
            <Icon name="{icon}" />
        </span>

        <span class="truncate">
            <slot />
        </span>
    </span>
</InertiaLink>
