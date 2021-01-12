<script>
    import { afterUpdate } from 'svelte';
    import FilledIcon from '~/Shared/FilledIcon';
    import Icon from '~/Shared/Icon';

    export let status = 'success';
    export let title = 'Success!';
    export let message = null;

    $: show = !!message;

    function hide() {
        show = false;
        message = null;
    }

    afterUpdate(() => {
        if (show) {
            App.sleep(3000).then(hide);
        }
    });

    let icons = {
        info: 'information-circle',
        success: 'check-circle',
        warning: 'exclamation',
        error: 'x-circle',
    };

    let iconColors = {
        info: 'text-blue-400',
        success: 'text-green-400',
        warning: 'text-yellow-400',
        error: 'text-red-400',
    };
</script>

<div
    class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end"
>
    <!--
        Notification panel, show/hide based on alert state.
    
        Entering: "transform ease-out duration-300 transition"
            From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            To: "translate-y-0 opacity-100 sm:translate-x-0"
        Leaving: "transition ease-in duration-100"
            From: "opacity-100"
            To: "opacity-0"
    -->
    <div
        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden"
        class:block="{show}"
        class:hidden="{!show}"
    >
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <Icon class="{iconColors[status]}" name="{icons[status]}" />
                </div>

                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">{title}</p>
                    <p class="mt-1 text-sm text-gray-500">{message}</p>
                </div>

                <div class="ml-4 flex-shrink-0 flex">
                    <button
                        class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        on:click="{hide}"
                    >
                        <span class="sr-only">Close</span>
                        <FilledIcon name="x" size="small" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
