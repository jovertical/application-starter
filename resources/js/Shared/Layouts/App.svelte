<script>
    import { Inertia } from '@inertiajs/inertia';
    import { InertiaLink, page } from '@inertiajs/inertia-svelte';
    import Icon from '~/Shared/Icon';
    import NavigationLink from '~/Shared/NavigationLink';
    import Notification from '~/Shared/Notification';
    import UserMenu from '~/Shared/UserMenu';

    let { route } = window;

    let open = false;

    function logout() {
        Inertia.post(route('logout'));
    }
</script>

<div class="min-h-screen bg-gray-100">
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img
                            class="h-8 w-8"
                            src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                            alt="Workflow" />
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <NavigationLink class="text-sm" route="home">
                                Dashboard
                            </NavigationLink>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <UserMenu on:logout="{logout}" />
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button
                        class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        on:click="{() => (open = !open)}">
                        <span class="sr-only">Open main menu</span>
                        <Icon class="{open ? 'hidden' : 'block'}" name="menu" />
                        <Icon class="{open ? 'block' : 'hidden'}" name="x" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" class:hidden="{!open}" class:block="{open}">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <NavigationLink route="home">Dashboard</NavigationLink>
            </div>

            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <span
                            class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                            <svg
                                class="h-full w-full text-gray-300"
                                fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </span>
                    </div>

                    <div class="ml-3">
                        <div
                            class="text-base font-medium leading-none text-white">
                            {$page.props.auth.user?.name}
                        </div>

                        <div
                            class="text-sm font-medium leading-none text-gray-400 mt-2">
                            {$page.props.auth.user?.email}
                        </div>
                    </div>
                </div>

                <div class="mt-3 px-2 space-y-1">
                    <InertiaLink
                        href="{route('settings.account.edit')}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">
                        Account Settings
                    </InertiaLink>

                    <a
                        href="{'#'}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700"
                        on:click="{logout}"> Logout </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <slot />

            {#if $page.props.flash.message}
                <Notification message="{$page.props.flash.message}" />
            {/if}
        </div>
    </main>
</div>
