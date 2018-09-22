@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url(1) }}" style="padding:5px;color:#fff; background-color: #0066cc">Prev</a>
    </li>
    <span>&nbsp;</span>  
    
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <span>&nbsp;</span>
        <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}"  style="padding:5px;color:#fff; background-color: #0066cc" >{{ $i }}</a>
        </li>
    <span>&nbsp;</span>
    @endfor
    
    <span>&nbsp;</span>   
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" style="padding:5px;color:#fff; background-color: #0066cc">Next</a>
    </li>
</ul>
@endif