<script>
    import { page } from '@inertiajs/inertia-svelte';
    import Alert from '~/Shared/Alert';
    import Guest from '~/Shared/Layouts/Guest';

    export let title;
</script>

<Guest>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img
            class="mx-auto h-12 w-auto"
            src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
            alt="Workflow" />

        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            {title}
        </h2>

        <p class="mt-2 text-center text-sm text-gray-600">
            <slot name="helper" />
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            {#if $page.props.status}
                <!-- prettier-ignore -->
                <Alert class="mb-6" status="success">
                    {#if $page.props.status === 'verification-link-sent'}
                        <span>
                            A new verification link has been sent to the email address you provided
                            during registration.
                        </span>
                    {:else}
                        <span>{$page.props.status}</span>
                    {/if}
                </Alert>
            {/if}

            <slot />
        </div>
    </div>
</Guest>
