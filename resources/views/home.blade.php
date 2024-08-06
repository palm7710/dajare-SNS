@extends('layouts.app')

@section('title', 'HOME')

@section('content')
<div class="mx-auto px-4">
    <p>HOME</p>
    <button class="bg-deep-purple text-white py-2 px-4 rounded">
        ボタン1
    </button>
    <button class="border border-deep-purple text-deep-purple py-2 px-4 rounded">
        ボタン2
    </button>
    <button class="bg-deep-purple text-white py-2 px-6 rounded-full">
        ボタン3
    </button>
    <button class="border border-deep-purple text-deep-purple py-2 px-6 rounded-full">
        ボタン4
    </button>
    <button class="text-deep-purple">
        <i class="fas fa-comment-alt"></i>
    </button>
    <button class="text-custom-red">
        <i class="fas fa-heart"></i>
    </button>
</div>
@endsection