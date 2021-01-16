<script>
    import FilledIcon from '~/Shared/FilledIcon';

    export let status;

    let icons = {
        success: 'check-circle',
    };
</script>

<div class="rounded-md bg-green-50 p-4 {$$props.class || ''}">
    <div class="flex">
        <div class="flex-shrink-0">
            <FilledIcon
                class="alert-icon {status}"
                name="{icons[status]}"
                size="small" />
        </div>

        <div class="ml-3">
            <p class="alert-text {status}">
                <slot />
            </p>
        </div>
    </div>
</div>
