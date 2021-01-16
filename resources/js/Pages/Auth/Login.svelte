<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import Button from '~/Shared/Button';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let { route } = window;

    let form = createForm({
        email: '',
        password: '',
    });

    function handleSubmit() {
        form.post(route('login'));
    }
</script>

<Auth title="Login to your account">
    <span slot="helper">
        Don't have an account yet?
        <InertiaLink
            class="font-medium text-indigo-600 hover:text-indigo-500"
            href="{route('register')}">register</InertiaLink>
    </span>

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
            autocomplete="current-password"
            value="{$form.password}"
            error="{$form.errors.password}"
            onChange="{form.handleChange}" />

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input
                    id="remember_me"
                    name="remember_me"
                    type="checkbox"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                <label
                    for="remember_me"
                    class="ml-2 block text-sm text-gray-900">
                    Remember me
                </label>
            </div>

            <div class="text-sm">
                <InertiaLink
                    class="font-medium text-indigo-600 hover:text-indigo-500"
                    href="{route('password.request')}">
                    Forgot your password?
                </InertiaLink>
            </div>
        </div>

        <Button class="w-full" type="submit" loading="{$form.loading}">
            Login
        </Button>
    </form>
</Auth>
