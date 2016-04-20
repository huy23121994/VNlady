<?php
// config
$link_limit = 10; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        @if($paginator->currentPage() == 1)
            <li class="disabled">
                <span>First</span>
             </li>
        @else
            <li>
                <a href="{{ $paginator->url(1) }}">First</a>
             </li>
        @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                @if($paginator->currentPage() == $i)
                    <li class="active">
                        <span>{{ $i }}</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endif
        @endfor
        @if($paginator->currentPage() == $paginator->lastPage())
            <li class="disabled">
                <span>Last</span>
             </li>
        @else
            <li>
                <a href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
             </li>
        @endif
    </ul>
@endif