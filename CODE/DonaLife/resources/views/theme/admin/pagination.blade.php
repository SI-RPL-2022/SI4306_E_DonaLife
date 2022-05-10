@if ($paginator->hasPages())
<div class="d-flex flex-row flex-column-fluid">
    <div class="d-flex flex-row-fluid flex-center">
        <ul class="pagination pagination-circle pagination-outline">
            @if ($paginator->onFirstPage())
            @else
            <li class="page-item previous m-1">
                <a href="javascript:;" class="page-link paginasi" halaman="{{ $paginator->previousPageUrl() }}">
                    <i class="previous"></i>
                </a>
            </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                <li class="page-item disabled m-1">
                    <a href="javascript:;" class="page-link">...</a>
                </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active m-1">
                            <a href="javascript:;" class="page-link">{{ $page }}</a>
                        </li>
                        @else
                        <li class="page-item m-1">
                            <a href="javascript:;" halaman="{{ $url }}" class="page-link paginasi">{{ $page }}</a>
                        </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <li class="page-item next m-1">
                <a href="javascript:;" halaman="{{ $paginator->nextPageUrl() }}" class="page-link paginasi">
                    <i class="next"></i>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
@endif