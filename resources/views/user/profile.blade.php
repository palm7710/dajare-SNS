@extends('layouts.app')

@section('title', 'USER')

@section('content')

<div class="flex items-center justify-center">
    <div class="mx-auto mt-8 w-1/3">
        <p class="text-center text-lg mb-4">@ {{ $user->user_id }}</p>    
        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="flex justify-center mb-4">
                <label for="profile_image" class="cursor-pointer">
                    <div class="relative">
                        <img src="{{ asset($user->profile_image) }}" class="w-48 h-48 rounded-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 flex justify-center mb-4">
                            <div class="bg-gray-800 bg-opacity-50 text-white text-xs font-bold rounded-full w-24 h-8 flex items-center justify-center">
                                変更する
                            </div>
                        </div>
                    </div>
                </label>
                <input type="file" id="profile_image" name="profile_image" class="hidden">
            </div>

            <div class="mb-4">
                <label for="user_name" class="block text-sm font-medium text-gray-700">ユーザー名</label>
                <input type="text" id="user_name" name="user_name" value="{{ $user->user_name }}" class="mt-1 block w-64 border border-gray-300 rounded-md p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="profile_text" class="block text-sm font-medium text-gray-700">自己紹介</label>
                <textarea id="profile_text" name="profile_text" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $user->profile_text }}</textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    プロフィールを変更する
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
