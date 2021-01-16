<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import { page } from '@inertiajs/inertia-svelte';
    import Button from '~/Shared/Button';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let { route } = window;

    let form = createForm({
        email: $page.props.email,
        password: '',
        password_confirmation: '',
        token: $page.props.token,
    });

    function handleSubmit() {
        form.post(route('password.update'));
    }
</script>

<Auth title="Reset password">
    <form class="space-y-6" on:submit|preventDefault="{handleSubmit}">
        <TextInput
            label="Email address"
            name="email"
            type="email"
            value="{$form.email}"
            error="{$form.errors.email}"
            onChange="{form.handleChange}" />

        <TextInput
            label="Password"
            name="password"
            type="password"
            value="{$form.password}"
            error="{$form.errors.password}"
            onChange="{form.handleChange}" />

        <TextInput
            label="Confirm Password"
            name="password_confirmation"
            type="password"
            value="{$form.password_confirmation}"
            error="{$form.errors.password_confirmation}"
            onChange="{form.handleChange}" />

        <div class="flex items-center justify-end">
            <InertiaLink
                class="font-medium text-indigo-600 hover:text-indigo-500 text-sm"
                href="{route('login')}">Back to login</InertiaLink>
        </div>

        <Button class="w-full" type="submit" loading="{$form.loading}">
            Reset Password
        </Button>
    </form>
</Auth>
