<section>
    <header>
        <h2 class="mt-7 font-semibold text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-7">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="relative">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            <!-- Button to toggle password visibility -->
            <button type="button" onclick="togglePasswordVisibility('update_password_password')" class="absolute right-3 top-9">
                <ion-icon name="eye-outline"></ion-icon>
            </button>
        </div>

        <!-- Confirm New Password -->
        <div class="relative">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            <!-- Button to toggle password visibility -->
            <button type="button" onclick="togglePasswordVisibility('update_password_password_confirmation')" class="absolute right-3 top-9">
                <ion-icon name="eye-outline"></ion-icon>
            </button>
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <!-- Success Message -->
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>

        <!-- Additional Success Message (for other purposes) -->
        @if(session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif
    </form>
</section>

<script>
    // Function to toggle password visibility
    function togglePasswordVisibility(id) {
        var input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>
