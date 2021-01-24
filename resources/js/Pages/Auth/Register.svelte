<script>
    import { InertiaLink } from '@inertiajs/inertia-svelte';
    import Button from '~/Shared/Button';
    import FormGroup from '~/Shared/FormGroup';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let { route } = window;

    let form = createForm({
        first_name: '',
        last_name: '',
        email: '',
        password: '',
    });

    function handleSubmit() {
        form.post(route('register'));
    }
</script>

<Auth title="Sign up to get started">
    <span slot="helper">
        Already have an account?
        <InertiaLink
            class="font-medium text-indigo-600 hover:text-indigo-500"
            href="{route('login')}">login</InertiaLink>
    </span>

    <form class="space-y-6" on:submit|preventDefault="{handleSubmit}">
        <FormGroup label="First name" error="{$form.errors.first_name}">
            <TextInput
                name="first_name"
                value="{$form.first_name}"
                on:change="{form.handleChange}"
                hasError="{!!$form.errors.first_name}" />
        </FormGroup>

        <FormGroup label="Last name" error="{$form.errors.last_name}">
            <TextInput
                name="last_name"
                value="{$form.last_name}"
                on:change="{form.handleChange}"
                hasError="{!!$form.errors.last_name}" />
        </FormGroup>

        <FormGroup label="Email address" error="{$form.errors.email}">
            <TextInput
                name="email"
                type="email"
                value="{$form.email}"
                on:change="{form.handleChange}"
                hasError="{!!$form.errors.email}" />
        </FormGroup>

        <FormGroup label="Password" error="{$form.errors.email}">
            <TextInput
                name="password"
                type="password"
                value="{$form.password}"
                on:change="{form.handleChange}"
                hasError="{!!$form.errors.password}" />
        </FormGroup>

        <Button class="w-full" type="submit" loading="{$form.loading}">
            Register
        </Button>
    </form>
</Auth>
