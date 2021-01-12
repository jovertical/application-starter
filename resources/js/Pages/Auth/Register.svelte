<script>
    import { Inertia } from '@inertiajs/inertia';
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import Button from '~/Shared/Button';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    export let errors = {};

    let route = window.route;

    let form = createForm({
        first_name: '',
        last_name: '',
        email: '',
        password: '',
    });

    function handleSubmit() {
        Inertia.post(route('register'), $form);
    }
</script>

<Auth title="Sign up to get started">
    <span slot="helper">
        Already have an account?
        <InertiaLink
            class="font-medium text-indigo-600 hover:text-indigo-500"
            href="{route('login')}"
        >
            login
        </InertiaLink>
    </span>

    <form class="space-y-6" on:submit|preventDefault="{handleSubmit}">
        <TextInput
            label="First name"
            name="first_name"
            value="{$form.first_name}"
            error="{errors.first_name}"
            onChange="{form.handleChange}"
        />

        <TextInput
            label="Last name"
            name="last_name"
            value="{$form.last_name}"
            error="{errors.last_name}"
            onChange="{form.handleChange}"
        />

        <TextInput
            label="Email address"
            name="email"
            type="email"
            value="{$form.email}"
            error="{errors.email}"
            onChange="{form.handleChange}"
        />

        <TextInput
            label="Password"
            name="password"
            type="password"
            value="{$form.password}"
            error="{errors.password}"
            onChange="{form.handleChange}"
        />

        <Button class="w-full" type="submit">Register</Button>
    </form>
</Auth>
