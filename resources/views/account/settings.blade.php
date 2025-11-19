<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <!-- Name -->
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', auth()->user()->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                :value="old('email', auth()->user()->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Current Password -->
                        <div class="mb-4" x-data="{ current_password: false }">
                            <x-input-label for="current_password" :value="__('Current Password')" />
                            <x-text-input id="current_password" name="current_password" type="password"
                                class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4" x-data="{ password: false }">
                            <x-input-label for="password" :value="__('New Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>

                    <hr class="my-6">

                    <h3 class="text-lg font-semibold mb-4">{{ __('User Preferences') }}</h3>

                    <!-- Current Preferences -->
                    @if (auth()->user()->preferences->count() > 0)
                        <div class="mb-4">
                            <h4 class="text-md font-medium mb-2">{{ __('Current Preferences') }}</h4>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach (auth()->user()->preferences as $preference)
                                    <li>{{ $preference->key }}:
                                        {{ is_array($preference->value) ? json_encode($preference->value) : $preference->value }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Add New Preference -->
                    <form method="POST" action="{{ route('userpreferences.store') }}">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="key" :value="__('Preference Key')" />
                            <x-text-input id="key" name="key" type="text" class="mt-1 block w-full"
                                required />
                            <x-input-error :messages="$errors->get('key')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="value" :value="__('Preference Value')" />
                            <x-text-input id="value" name="value" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('value')" class="mt-2" />
                        </div>

                        <x-primary-button>{{ __('Add Preference') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
