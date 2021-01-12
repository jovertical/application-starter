<script>
    import { Inertia } from '@inertiajs/inertia';
    import Button from '~/Shared/Button';
    import Auth from '~/Shared/Layouts/Auth';
    import TextInput from '~/Shared/TextInput';

    function handleLogout() {
        Inertia.post(route('logout'));
    }

    function handleSubmit() {
        Inertia.post(route('verification.send'));
    }
</script>

<Auth title="Verify email">
    <div class="space-y-6">
        <p class="text-sm text-gray-600">
            Thanks for signing up! Before getting started, could you verify your email address by
            clicking on the link we just emailed to you? If you didn't receive the email, we will
            gladly send you another.
        </p>

        <form class="flex items-center justify-center" on:submit|preventDefault="{handleLogout}">
            <button class="font-medium text-indigo-600 hover:text-indigo-500 text-sm" type="submit">
                Logout
            </button>
        </form>

        <form on:submit|preventDefault="{handleSubmit}">
            <Button class="w-full" type="submit">Resend Verification Email</Button>
        </form>
    </div>
</Auth>
