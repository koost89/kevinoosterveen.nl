@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="text-2xl text-bold text-gray-800">
                {!! __('pagination.newer') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-2xl text-bold bg-transition-underline">
                <span>{!! __('pagination.newer') !!}</span>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-2xl text-bold bg-transition-underline">
                <span>{!! __('pagination.older') !!}</span>
            </a>
        @else
            <span class="text-2xl text-bold text-gray-700">
                {!! __('pagination.older') !!}
            </span>
        @endif
    </nav>
@endif
