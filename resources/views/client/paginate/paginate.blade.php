@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        @if($paginator->currentPage() == 1)
        <span><i class="fa fa-angle-left"></i></span>
        @else
        <a href="{{$paginator->url($paginator->currentPage()-1)}}"><i class="fa fa-angle-left"></i></a>
        @endif
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            @if($paginator->currentPage() == $i)
            <span>{{$i}}</span>
            @else
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            @endif
        </li>
    @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        @if($paginator->currentPage() == $paginator->lastPage())
        <span><i class="fa fa-angle-right"></i></span>
        @else
        <a href="{{$paginator->url($paginator->currentPage()+1)}}"><i class="fa fa-angle-right"></i></a>
        @endif
    </li>
</ul>
@endif