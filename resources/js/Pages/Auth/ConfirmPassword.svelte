<script>
    import Button from '~/Shared/Button';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let form = createForm({
        password: '',
    });

    function handleSubmit() {
        form.post(route('password.confirm'));
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
            error="{$form.errors.password}"
            onChange="{form.handleChange}"
        />

        <Button class="w-full" type="submit" loading="{$form.loading}">
            Confirm
        </Button>
    </form>
</Auth>
