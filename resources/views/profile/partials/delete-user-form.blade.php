<section class="space-y-6">
    <header class="space-y-1">
        <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    {{-- Danger zone container --}}
    <div class="rounded-2xl border border-red-200 bg-red-50/70 p-5 dark:border-red-900/40 dark:bg-red-950/30">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-200">
                        <!-- simple warning icon -->
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 9v4m0 4h.01" />
                            <path d="M10.29 3.86l-8.4 14.53A2 2 0 0 0 3.62 21h16.76a2 2 0 0 0 1.73-2.61L13.71 3.86a2 2 0 0 0-3.42 0z" />
                        </svg>
                    </span>

                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('Danger zone') }}
                    </h3>
                </div>

                <p class="text-sm leading-6 text-gray-700 dark:text-gray-300">
                    {{ __('Deleting your account is permanent. This action cannot be undone.') }}
                </p>
            </div>

            <x-danger-button
                class="w-full sm:w-auto justify-center"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8">
            @csrf
            @method('delete')

            <div class="space-y-2">
                <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <div class="relative">
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="block w-full sm:w-96"
                        placeholder="{{ __('Password') }}"
                        autocomplete="current-password"
                    />

                    {{-- optional: subtle hint text --}}
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        {{ __('Enter your current password to confirm.') }}
                    </p>
                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <x-secondary-button class="w-full sm:w-auto justify-center" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="w-full sm:w-auto justify-center">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
