<script>
    import Button from '~/Shared/Button';
    import FormGroup from '~/Shared/FormGroup';
    import Settings from '~/Shared/Layouts/Settings';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let form = createForm({
        current_password: '',
        password: '',
    });

    function handleSubmit() {
        form.patch(route('settings.password.update'));
    }
</script>

<Settings>
    <section aria-labelledby="password_heading">
        <form on:submit|preventDefault="{handleSubmit}">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2
                            id="password_heading"
                            class="text-lg leading-6 font-medium text-gray-900">
                            Password
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Ensure your account is using a long, random password
                            to stay secure
                        </p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <FormGroup
                            class="col-span-4 sm:col-span-2"
                            label="Current Password"
                            error="{$form.errors.current_password}">
                            <TextInput
                                name="current_password"
                                type="password"
                                autocomplete="current-password"
                                value="{$form.current_password}"
                                on:change="{form.handleChange}"
                                hasError="{!!$form.errors.current_password}" />
                        </FormGroup>

                        <FormGroup
                            class="col-span-4 sm:col-span-2"
                            label="Password"
                            error="{$form.errors.password}">
                            <TextInput
                                name="password"
                                type="password"
                                value="{$form.password}"
                                on:change="{form.handleChange}"
                                hasError="{!!$form.errors.password}" />
                        </FormGroup>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <Button type="submit" loading="{$form.loading}">
                        Save
                    </Button>
                </div>
            </div>
        </form>
    </section>
</Settings>
