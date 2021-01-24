<script>
    import cx from '~/directives/cx';
    import FilledIcon from '~/Shared/FilledIcon';
    export let status;

    let icons = {
        success: 'check-circle',
    };
</script>

<div class="rounded-md bg-green-50 p-4 {$$props.class || ''}">
    <div class="flex">
        <div
            class="flex-shrink-0"
            use:cx="{{ 'text-green-400': status === 'success' }}">
            <FilledIcon name="{icons[status]}" size="small" />
        </div>

        <div class="ml-3">
            <p
                class="text-sm font-medium"
                use:cx="{{ 'text-green-800': status === 'success' }}">
                <slot />
            </p>
        </div>
    </div>
</div>
