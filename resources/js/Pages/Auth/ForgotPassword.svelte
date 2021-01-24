<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import Button from '~/Shared/Button';
    import FormGroup from '~/Shared/FormGroup';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let route = window.route;

    let form = createForm({
        email: '',
    });

    function handleSubmit() {
        form.post(route('password.email'));
    }
</script>

<Auth title="Forgot password">
    <span slot="helper">
        Just let us know your email address and we will email you a password
        reset link that will allow you to choose a new one.
    </span>

    <form class="space-y-6" on:submit|preventDefault="{handleSubmit}">
        <FormGroup label="Email address" error="{$form.errors.email}">
            <TextInput
                name="email"
                type="email"
                value="{$form.email}"
                on:change="{form.handleChange}"
                hasError="{!!$form.errors.email}" />
        </FormGroup>

        <div class="flex items-center justify-center">
            <InertiaLink
                class="font-medium text-indigo-600 hover:text-indigo-500 text-sm"
                href="{route('login')}">Back to login</InertiaLink>
        </div>

        <Button class="w-full" type="submit" loading="{$form.loading}">
            Email Password Reset Link
        </Button>
    </form>
</Auth>
