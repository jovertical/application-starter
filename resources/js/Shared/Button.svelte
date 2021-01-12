<script>
    export let type = 'button';
    export let variant = 'primary';
</script>

<button type="{type}" class="button {variant} {$$props.class}">
    <slot />
</button>
