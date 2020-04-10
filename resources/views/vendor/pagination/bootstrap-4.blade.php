<style>
    .page-item{
        word-break: keep-all;
    }

</style>

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">首页</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}" rel="prev" aria-label="@lang('pagination.previous')">首页</a>
                </li>
            @endif
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">上一页</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">上一页</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">下一页</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">下一页</span>
                </li>
            @endif

            {{-- 尾页 --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a  class="page-link" href="{{ $paginator->url($paginator->lastPage()) . '&limit=' . $paginator->perPage() }}">尾页</a>
                </li>
            @else
                <li class="disabled page-item">
                    <span  class="page-link">尾页</span>
                </li>
            @endif
            <li class="page-item" style="margin-left: 10px;">
                <span class="page-link" style="padding: 0.35rem;" aria-hidden="true">跳转到:<input id="customPage" onkeyup="changePage(event)" type="text" style="width: 50px"> 页</span>
{{--                <input type="text" style="width: 50px" class="form-control">--}}

{{--                <input type="text" style="width: 50px" class="form-control">--}}
{{--                <span class="page-link" >页</span>--}}
            </li>
{{--            <li class="page-item">--}}
{{--                <input type="text" style="width: 50px" class="form-control">--}}
{{--            </li>--}}
{{--            <li class="page-item">--}}
{{--                <input type="text" style="width: 50px" class="form-control">--}}
{{--            </li>--}}
        </ul>
    </nav>
@endif
<script>
    function changePage(e) {
        var evt = window.event || e;
        if (evt.keyCode == 13){
            window.location.href='{{substr($paginator->url(1), 0, strlen($paginator->url(1))-1) }}'+ $('#customPage').val();
        }
    }
</script>
