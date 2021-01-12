<script>
    import { InertiaLink, page } from '@inertiajs/inertia-svelte';
    import Guest from '~/Shared/Layouts/Guest';

    let route = window.route;
</script>

<Guest>
    <div class="fixed top-0 inset-x-0 w-full">
        <div class="flex items-center justify-end space-x-6 h-20 px-10">
            {#if !$page.props.auth.authenticated}
                <InertiaLink
                    class="text-gray-800 underline hover:no-underline"
                    href="{route('login')}"
                >
                    Login
                </InertiaLink>

                <InertiaLink
                    class="text-gray-800 underline hover:no-underline"
                    href="{route('register')}"
                >
                    Register
                </InertiaLink>
            {:else}
                <InertiaLink
                    class="text-gray-800 underline hover:no-underline"
                    href="{route('home')}"
                >
                    Dashboard
                </InertiaLink>
            {/if}
        </div>
    </div>

    <h1 class="text-5xl text-center text-gray-700">Application Starter</h1>
</Guest>
