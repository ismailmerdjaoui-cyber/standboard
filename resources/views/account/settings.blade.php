@extends('layouts.app')

@section('title', __('messages.account_settings'))

@section('page-title', __('messages.account_settings'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.account_settings') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">{{ __('messages.name') }}</label>
                            <input id="name" name="name" type="text" class="form-control"
                                value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('messages.email') }}</label>
                            <input id="email" name="email" type="email" class="form-control"
                                value="{{ old('email', auth()->user()->email) }}" required autocomplete="username" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Password -->
                        <div class="mb-4">
                            <label for="current_password" class="form-label">{{ __('messages.current_password') }}</label>
                            <input id="current_password" name="current_password" type="password" class="form-control"
                                autocomplete="current-password" />
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('messages.new_password') }}</label>
                            <input id="password" name="password" type="password" class="form-control"
                                autocomplete="new-password" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation"
                                class="form-label">{{ __('messages.confirm_password') }}</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="form-control" autocomplete="new-password" />
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Language -->
                        <div class="mb-4">
                            <label for="language" class="form-label">{{ __('messages.language') }}</label>
                            <select id="language" name="language" class="form-control">
                                <option value="en"
                                    {{ old('language', auth()->user()->language) == 'en' ? 'selected' : '' }}>
                                    {{ __('messages.english') }}</option>
                                <option value="fr"
                                    {{ old('language', auth()->user()->language) == 'fr' ? 'selected' : '' }}>
                                    {{ __('messages.french') }}</option>
                            </select>
                            @error('language')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Theme -->
                        <div class="mb-4">
                            <label for="theme" class="form-label">{{ __('messages.theme') }}</label>
                            <select id="theme" name="theme" class="form-control">
                                <option value="light"
                                    {{ old('theme', auth()->user()->theme) == 'light' ? 'selected' : '' }}>
                                    {{ __('messages.light') }}</option>
                                <option value="dark"
                                    {{ old('theme', auth()->user()->theme) == 'dark' ? 'selected' : '' }}>
                                    {{ __('messages.dark') }}</option>
                            </select>
                            @error('theme')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Enable Notifications -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifications_enabled"
                                    name="notifications_enabled" value="1"
                                    {{ old('notifications_enabled', auth()->user()->notifications_enabled) ? 'checked' : '' }}>
                                <label class="form-check-label" for="notifications_enabled">
                                    {{ __('messages.enable_notifications') }}
                                </label>
                            </div>
                            @error('notifications_enabled')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (session('status') === 'profile-updated')
        <script type="module">
            notie.alert({
                type: 'success',
                text: '{{ __('messages.profile_updated_successfully') }}'
            });
        </script>
    @endif
@endpush
