<script>
    import Button from '~/Shared/Button';
    import FormGroup from '~/Shared/FormGroup';
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
        This is a secure area of the application. Please confirm your password
        before continuing.
    </span>

    <form class="space-y-6" on:submit|preventDefault="{handleSubmit}">
        <FormGroup label="Password" error="{$form.errors.password}">
            <TextInput
                name="password"
                type="password"
                value="{$form.password}"
                on:change="{form.handleChange}"
                hasError="{!!$form.errors.password}" />
        </FormGroup>

        <Button class="w-full" type="submit" loading="{$form.loading}">
            Confirm
        </Button>
    </form>
</Auth>
