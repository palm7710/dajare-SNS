@if ($paginator->hasPages())
<div class="flex justify-center my-8">
    <div class="flex space-x-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <button class="border border-deep-purple text-deep-purple w-10 h-10 flex items-center justify-center rounded-full cursor-not-allowed opacity-50" disabled>&lt;</button>
        @else
        <a class="border border-deep-purple text-deep-purple w-10 h-10 flex items-center justify-center rounded-full hover:bg-deep-purple hover:text-white transition duration-150" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <span class="text-deep-purple w-10 h-10 flex items-center justify-center">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="text-white bg-light-purple w-10 h-10 flex items-center justify-center rounded-full">{{ $page }}</span>
        @else
        <a class="text-deep-purple font-light w-10 h-10 flex items-center justify-center rounded-full hover:bg-light-purple hover:text-white transition duration-150" href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a class="border border-deep-purple text-deep-purple w-10 h-10 flex items-center justify-center rounded-full hover:bg-deep-purple hover:text-white transition duration-150" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
        @else
        <button class="border border-deep-purple text-deep-purple w-10 h-10 flex items-center justify-center rounded-full cursor-not-allowed opacity-50" disabled>&gt;</button>
        @endif
    </div>
</div>
@endif