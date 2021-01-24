<script>
    export let name = '';
    export let value = '';
</script>

<p
    id="{name + '-error'}"
    class="mt-1 text-sm text-red-600 {$$props.class || ''}">
    {value}
</p>
