<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.user_details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
                    <p>{{ __('messages.email') }}: {{ $user->email }}</p>
                    <p>{{ __('messages.created_at') }}: {{ $user->created_at }}</p>

                    <div class="mt-4">
                        <a href="{{ route('users.edit', $user) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('messages.edit') }}
                        </a>
                        <a href="{{ route('users.index') }}"
                            class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('messages.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
