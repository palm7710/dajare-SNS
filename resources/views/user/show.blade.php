@extends('layouts.app')

@section('title', 'USER')

@section('content')

<div class="flex items-center justify-center">
    <div class="mx-auto mt-8 w-1/3">
        <p class="text-center text-lg mb-4">@ {{ $user->user_id }}</p>    

        <div class="flex justify-center mb-4">
            <div class="relative">
                <img src="{{ asset($user->profile_image) }}" class="w-48 h-48 rounded-full object-cover">
            </div>
        </div>

        <div class="mb-4">
            <p class="block text-sm font-medium text-gray-700">ユーザー名:</p>
            <p class="mt-1 block w-64 p-2">{{ $user->user_name }}</p>
        </div>

        <div class="mb-4">
            <p class="block text-sm font-medium text-gray-700">自己紹介:</p>
            <p class="mt-1 block w-full p-2">{{ $user->profile_text }}</p>
        </div>
    </div>
</div>

@endsection
