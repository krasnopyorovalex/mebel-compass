@if ($paginator->hasPages())
    <ul class="pagination-classic" role="navigation">
        {{-- Previous Page Link --}}
        @if ( ! $paginator->onFirstPage())
            <li>
                <a class="icon linear-icon-arrow-left" href="{{ request()->url() }}{{ str_replace('?page=1', '', $paginator->previousPageUrl()) }}" rel="prev"></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ request()->url() }}{{ str_replace('?page=1', '', $url) }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="icon linear-icon-arrow-right" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
            </li>
        @endif
    </ul>
@endif
