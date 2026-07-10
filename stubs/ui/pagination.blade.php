@props([
    'current' => 1,
    'total' => 1,
    'siblingCount' => 1,
    'size' => 'md',         // sm, md, lg
    'simple' => false,
])

@php
    $classes = 'pagination';

    $range = [];
    $totalPages = $total;
    $currentPage = max(1, min($current, $totalPages));

    if ($totalPages <= 7) {
        $range = range(1, $totalPages);
    } else {
        $leftSibling = max($currentPage - $siblingCount, 1);
        $rightSibling = min($currentPage + $siblingCount, $totalPages);

        $showLeftDots = $leftSibling > 2;
        $showRightDots = $rightSibling < $totalPages - 1;

        if (!$showLeftDots && $showRightDots) {
            $range = array_merge(range(1, 3 + $siblingCount * 2), ['...', $totalPages]);
        } elseif ($showLeftDots && !$showRightDots) {
            $range = array_merge([1, '...'], range($totalPages - 2 - $siblingCount * 2, $totalPages));
        } elseif ($showLeftDots && $showRightDots) {
            $range = array_merge([1, '...'], range($leftSibling, $rightSibling), ['...', $totalPages]);
        }
    }
@endphp

<nav {{ $attributes->merge(['class' => 'pagination']) }} aria-label="Pagination">
    {{-- Previous --}}
    @if($simple)
        <button
            class="btn btn-outline btn-{{ $size }}"
            @if($currentPage <= 1) disabled @endif
            aria-label="Previous"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
        </button>
        <span class="text-sm text-muted-foreground px-2">
            {{ $currentPage }} / {{ $totalPages }}
        </span>
        <button
            class="btn btn-outline btn-{{ $size }}"
            @if($currentPage >= $totalPages) disabled @endif
            aria-label="Next"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    @else
        <button
            class="btn btn-outline btn-{{ $size }}"
            @if($currentPage <= 1) disabled @endif
            aria-label="Previous"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
        </button>

        @foreach($range as $page)
            @if($page === '...')
                <span class="btn btn-ghost btn-{{ $size }} cursor-default">...</span>
            @else
                <button
                    @if($page == $currentPage) disabled @endif
                    class="btn {{ $page == $currentPage ? 'btn-active' : 'btn-outline' }} btn-{{ $size }}"
                    aria-label="Page {{ $page }}"
                    @if($page == $currentPage) aria-current="page" @endif
                >
                    {{ $page }}
                </button>
            @endif
        @endforeach

        <button
            class="btn btn-outline btn-{{ $size }}"
            @if($currentPage >= $totalPages) disabled @endif
            aria-label="Next"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    @endif
</nav>
