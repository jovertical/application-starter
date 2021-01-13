<script>
    import { createEventDispatcher } from 'svelte';
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import Transition from 'svelte-class-transition';
    import clickOutside from '~/directives/clickOutside';

    let dispatch = createEventDispatcher();

    let { route } = window;

    let show = false;

    function close() {
        show = false;
    }

    function open() {
        show = true;
    }

    function logout() {
        dispatch('logout');
    }
</script>

<div class="relative {$$props.class}" use:clickOutside on:click_outside="{close}">
    <div>
        <button
            class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
            id="user-menu"
            aria-haspopup="true"
            on:click="{open}"
        >
            <span class="sr-only">Open user menu</span>
            <span class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"
                    ></path>
                </svg>
            </span>
        </button>
    </div>

    <Transition
        toggle="{show}"
        inTransition="transition ease-out duration-100"
        inState="transform opacity-0 scale-95"
        onState="{'transform opacity-100 scale-100'}"
        outState="transform opacity-0 scale-95"
        outTransition="transition ease-in duration-75"
    >
        <div
            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="user-menu"
        >
            <InertiaLink
                href="{route('settings.account.edit')}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem"
            >
                My Profile
            </InertiaLink>

            <a
                href="{'#'}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem"
                on:click="{logout}"
            >
                Logout
            </a>
        </div>
    </Transition>
</div>
