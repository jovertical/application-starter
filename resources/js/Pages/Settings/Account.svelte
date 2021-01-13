<script>
    import { page } from '@inertiajs/inertia-svelte';
    import Button from '~/Shared/Button';
    import Settings from '~/Shared/Layouts/Settings';
    import TextInput from '~/Shared/TextInput';
    import { createForm } from '~/stores/form';

    let form = createForm({
        first_name: $page.props.auth.user.first_name,
        last_name: $page.props.auth.user.last_name,
        email: $page.props.auth.user.email,
    });

    function handleSubmit() {
        form.patch(route('settings.account.update'));
    }
</script>

<Settings>
    <section aria-labelledby="profile_heading">
        <form on:submit|preventDefault="{handleSubmit}">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h2
                            id="profile_heading"
                            class="text-lg leading-6 font-medium text-gray-900"
                        >
                            Profile
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            This information will be displayed publicly so be careful what you
                            share.
                        </p>
                    </div>

                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="col-span-4 sm:col-span-2">
                            <TextInput
                                label="First name"
                                name="first_name"
                                value="{$form.first_name}"
                                error="{$form.errors.first_name}"
                                onChange="{form.handleChange}"
                            />
                        </div>

                        <div class="col-span-4 sm:col-span-2">
                            <TextInput
                                label="Last name"
                                name="last_name"
                                value="{$form.last_name}"
                                error="{$form.errors.last_name}"
                                onChange="{form.handleChange}"
                            />
                        </div>

                        <div class="col-span-4 sm:col-span-3">
                            <TextInput
                                label="Email address"
                                name="email"
                                type="email"
                                value="{$form.email}"
                                error="{$form.errors.email}"
                                onChange="{form.handleChange}"
                            />
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <Button type="submit" loading="{$form.loading}">Save</Button>
                </div>
            </div>
        </form>
    </section>
</Settings>
