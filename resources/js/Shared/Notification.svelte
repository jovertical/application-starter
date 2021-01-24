<script>
    import { afterUpdate } from 'svelte';
    import Transition from 'svelte-class-transition';
    import cx from '~/directives/cx';
    import FilledIcon from '~/Shared/FilledIcon';
    import Icon from '~/Shared/Icon';

    export let status = 'success';
    export let title = 'Success!';
    export let message = '';

    $: show = !!message;

    function hide() {
        show = false;
    }

    afterUpdate(async () => {
        if (show) {
            await App.sleep(3000);
            hide();
            await App.sleep(500);
            message = '';
        }
    });

    let icons = {
        info: 'information-circle',
        success: 'check-circle',
        warning: 'exclamation',
        error: 'x-circle',
    };
</script>

<div
    class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
    <Transition
        toggle="{show}"
        inTransition="transform ease-out duration-300 transition"
        inState="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        onState="{'translate-y-0 opacity-100 sm:translate-x-0'}"
        outState="opacity-0"
        outTransition="transition ease-in duration-100">
        <div
            class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div
                        class="flex-shrink-0"
                        use:cx="{{
                            'text-blue-400': status === 'info',
                            'text-green-400': status === 'success',
                            'text-yellow-400': status === 'warning',
                            'text-red-400': status === 'error',
                        }}">
                        <Icon name="{icons[status]}" />
                    </div>

                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">{title}</p>
                        <p class="mt-1 text-sm text-gray-500">{message}</p>
                    </div>

                    <div class="ml-4 flex-shrink-0 flex">
                        <button
                            class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            on:click="{hide}">
                            <span class="sr-only">Close</span>
                            <FilledIcon name="x" size="small" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</div>
