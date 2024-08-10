@extends('layouts.app')

@section('title', 'SIGN UP')

@section('content')

<x-guest-layout>
    <div class="p-8 rounded-lg w-full max-w-sm mx-auto">
        <h2 class="text-center text-2xl font-bold mb-6">アカウントを作成します</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- User Name -->
            <div class="mb-4">
                <x-input-label for="user_name" value="ユーザ名" class="block text-custom-gray font-bold mb-2" />
                <x-text-input id="user_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray leading-tight focus:outline-none focus:shadow-outline" type="text" name="user_name" :value="old('user_name')" required autocomplete="user_name" />
                <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
            </div>

            <!-- User ID -->
            <div class="mb-4">
                <x-input-label for="user_id" value="ユーザID" class="block text-custom-gray font-bold mb-2" />
                <x-text-input id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray leading-tight focus:outline-none focus:shadow-outline" type="text" name="user_id" :value="old('user_id')" required autofocus autocomplete="user_id" />
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" value="メールアドレス" class="block text-custom-gray font-bold mb-2" />
                <x-text-input id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" value="パスワード" class="block text-custom-gray font-bold mb-2" />
                <x-text-input id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" value="パスワードを再入力" class="block text-custom-gray font-bold mb-2" />
                <x-text-input id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-custom-gray leading-tight focus:outline-none focus:shadow-outline" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a style="color: #6D4584;" class="underline text-sm hover:text-deep-purple rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('アカウントをお持ちの場合はこちら') }}
                </a>

                <x-primary-button style="background-color: #6D4584; color: white;" class="hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ms-3">
                    {{ __('登録') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
@endsection