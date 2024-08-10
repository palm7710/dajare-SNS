@extends('layouts.app')

@section('title', 'LOGIN')

@section('content')
<x-guest-layout>
    <div class="flex">
        <div class="p-8 rounded-lg  w-full max-w-sm">
            <div class="flex justify-center mb-6">
                <!-- ペンギンアイコン -->
                <img src="{{ asset('images/Linux.png') }}" alt="Linux Icon" class="h-16">
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- User ID -->
                <div class="mb-4">
                    <x-input-label for="user_id" value="ユーザID" class="block text-custom-gray font-bold mb-2" />
                    <x-text-input id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray leading-tight focus:outline-none focus:shadow-outline" type="text" name="user_id" :value="old('user_id')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" value="パスワード" class="block text-custom-gray font-bold mb-2" />
                    <x-text-input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-custom-gray text-custom-gray shadow-sm focus:ring-custom-gray" name="remember">
                        <span class="ms-2 text-sm text-custom-gray">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                    <a style="color: #6D4584;" class="underline text-sm hover:text-deep-purple
                     rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('パスワードをお忘れですか？') }}
                    </a>
                    @endif

                    <x-primary-button style="background-color: #6D4584;" class="hover:bg-deep-purple text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ms-3">
                        {{ __('ログイン') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('register') }}" style="color: #6D4584;" class="inline-block align-baseline font-bold text-sm hover:text-deep-purple">
                    アカウントをお持ちでない場合はこちら
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
@endsection