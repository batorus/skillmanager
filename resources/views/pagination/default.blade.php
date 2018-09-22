@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li >
        <a href="{{ $paginator->url(1) }}" class="{{ ($paginator->currentPage() == 1) ? ' btn btn-primary disabled' : 'btn btn-primary' }}">Prev</a>
    </li>
    <span>&nbsp;</span>  
    
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <span>&nbsp;</span>
        <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}"  class='btn btn-primary' >{{ $i }}</a>
        </li>
    <span>&nbsp;</span>
    @endfor
    
    <span>&nbsp;</span>   
    <li >
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}"  
           class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'btn btn-primary disabled' : 'btn btn-primary' }}"  
           >
            Next
        </a>
    </li>
</ul>
@endif