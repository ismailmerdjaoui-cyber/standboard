<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.create_user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">{{ __('messages.name') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="w-full px-3 py-2 border rounded" required>
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">{{ __('messages.email') }}</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="w-full px-3 py-2 border rounded" required>
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">{{ __('messages.password') }}</label>
                            <input type="password" name="password" id="password"
                                class="w-full px-3 py-2 border rounded" required>
                            @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('messages.create_user') }}
                        </button>
                        <a href="{{ route('users.index') }}"
                            class="ml-4 text-gray-500">{{ __('messages.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
