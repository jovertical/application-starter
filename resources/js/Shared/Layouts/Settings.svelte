<script>
    import App from '~/Shared/Layouts/App';
    import SettingsLink from '~/Shared/SettingsLink';
</script>

<App>
    <div class="max-w-5xl mx-auto">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
                <nav class="space-y-1">
                    <SettingsLink
                        route="settings.account.edit"
                        icon="user-circle">Account</SettingsLink>

                    <SettingsLink route="settings.password.edit" icon="key">
                        Password
                    </SettingsLink>
                </nav>
            </aside>

            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <slot />
            </div>
        </div>
    </div>
</App>
