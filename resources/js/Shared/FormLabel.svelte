<script>
    export let value = '';
</script>

<label
    class="block text-sm font-medium text-gray-700 {$$props.class || ''}"
    for="{$$props.for}">
    {value}
</label>
