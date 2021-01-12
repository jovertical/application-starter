<script>
    import { Inertia } from '@inertiajs/inertia';
    import Button from '~/Shared/Button';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    export let errors = {};

    let form = createForm({
        password: '',
    });

    function handleSubmit() {
        Inertia.post(route('password.confirm'), $form);
    }
</script>

<Auth title="Confirm password">
    <span slot="helper">
        This is a secure area of the application. Please confirm your password before continuing.
    </span>

    <form class="space-y-6" on:submit|preventDefault="{handleSubmit}">
        <TextInput
            label="Password"
            name="password"
            type="password"
            value="{$form.password}"
            error="{errors.password}"
            onChange="{form.handleChange}"
        />

        <Button class="w-full" type="submit">Confirm</Button>
    </form>
</Auth>
