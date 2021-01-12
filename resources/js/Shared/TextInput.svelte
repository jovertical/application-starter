<script>
    import FilledIcon from '~/Shared/FilledIcon';

    export let onChange;
    export let label;
    export let type = 'text';
    export let name;
    export let error;

    $: props = (({ onChange, label, type, name, errors, ...other }) => other)($$props);
</script>

<div>
    {#if label}<label for="{name}" class="form-label">{label}</label>{/if}

    <div class="mt-1 relative rounded-md shadow-sm">
        <input
            id="{name}"
            type="{type}"
            name="{name}"
            aria-invalid="{!!error}"
            aria-describedby="{name + '-error'}"
            {...props}
            on:change="{onChange}"
            class="form-input"
            class:error
        />

        {#if error}
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <FilledIcon class="text-red-500" name="exclamation-circle" size="small" />
            </div>
        {/if}
    </div>

    {#if error}
        <p id="{name + '-error'}" class="form-error">{error}</p>
    {/if}
</div>
