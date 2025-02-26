@extends('layouts.auth')
@section('content')
<div class="h-full flex flex-col justify-center items-center dark">
    <x-slot name="logo">
        <x-authentication-card-logo />
    </x-slot>

    <x-validation-errors class="mb-4" />

    @session('status')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
    </div>
    @endsession

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-label for="email" value="{{ __('Email') }}" class="block capitalize form-label" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}" class="block capitalize form-label" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <!-- <x-checkbox id="remember_me" name="remember" />
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span> -->
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a> -->
            @endif

            <button class="btn btn-dark block w-full text-center">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
@endsection