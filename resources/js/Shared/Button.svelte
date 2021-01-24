<script>
    import { createEventDispatcher } from 'svelte';
    import { Inertia } from '@inertiajs/inertia';
    import cx from '~/directives/cx';

    let dispatch = createEventDispatcher();

    export let type = 'button';
    export let variant = 'primary';
    export let loading = false;
    export let path = '/';

    $: primary = variant === 'primary';
    $: secondary = variant === 'secondary';

    function handleClick() {
        if (type === 'link') {
            return Inertia.get(path);
        }

        dispatch('click');
    }
</script>

<button
    class="inline-flex justify-center py-2 px-4 border rounded-md shadow-sm text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {$$props.class}"
    use:cx="{{
        'bg-indigo-600 hover:bg-indigo-700 border-transparent text-white': primary,
        'bg-white border-gray-300 text-gray-700 hover:bg-gray-50': secondary,
    }}"
    type="{type}"
    on:click="{handleClick}">
    {#if loading}
        <svg
            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24">
            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4">
            </circle>
            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
    {/if}

    <slot />
</button>
