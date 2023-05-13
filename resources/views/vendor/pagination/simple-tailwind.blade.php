@if ($paginator->hasPages())
    <nav class="float-right">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage() === False)
            <a class="button button-outline" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="button button-outline" href="{{ $paginator->nextPageUrl() }}" rel="next">
                {!! __('pagination.next') !!}
            </a>
        @endif
    </nav>
@endif
