@extends('layouts.app')

@section('title', 'Registration Complete')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg w-full max-w-md">
        <h2 class="text-center text-2xl font-bold mb-6">登録が完了しました</h2>
        <div class="flex justify-center">
            <a href="{{ route('login') }}" style="background-color: #6D4584;" class="text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                ログイン
            </a>
        </div>
    </div>
</div>
@endsection