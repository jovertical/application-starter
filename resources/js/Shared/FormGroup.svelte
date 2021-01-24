<script>
    import FormError from '~/Shared/FormError';
    import FormLabel from '~/Shared/FormLabel';

    export let label;
    export let name;
    export let error;
</script>

<div {...$$props}>
    {#if label}
        <FormLabel for="{name}" value="{label}" />
    {/if}

    <div class="mt-1">
        <slot />
    </div>

    {#if error}
        <FormError name="{name}" value="{error}" />
    {/if}
</div>
