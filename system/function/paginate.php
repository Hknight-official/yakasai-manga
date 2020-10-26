<?php
function createLinks($links, $total, $limit, $page, $url)
{

    $last       = ceil($total / $limit);

    $start      = (($page - $links) > 0) ? $page - $links : 1;
    $end        = (($page + $links) < $last) ? $page + $links : $last;

    $html       = '<div class="pagination_wrap">';

    $class      = ($page == 1) ? "disabled" : "";
    $html       .= '<a class="' . $class . ' paging_item paging_prevnext prev hover-a" href="'.$url.'&page=' . ($page - 1) . '">&laquo;</a>';

    if ($start > 1) {
        $html   .= '<a class="paging_item page_num hover-a" href="'.$url.'&page=1">1</a>';
        $html   .= '<a class="disabled paging_item page_num hover-a"><span>...</span></a>';
    }

    for ($i = $start; $i <= $end; $i++) {
        $class  = ($page == $i) ? "current" : "";
        $html   .= '<a class="' . $class . ' paging_item page_num hover-a" href="'.$url.'&page=' . $i . '">' . $i . '</a>';
    }

    if ($end < $last) {
        $html   .= '<a class="disabled paging_item page_num hover-a"><span>...</span></a>';
        $html   .= '<a class="paging_item page_num hover-a" href="'.$url.'&page=' . $last . '">' . $last . '</a>';
    }

    $class      = ($page == $last) ? "disabled" : "";
    $html       .= '<a class="' . $class . ' paging_item paging_prevnext prev hover-a" href="'.$url.'&page=' . ($page + 1) . '">&raquo;</a>';

    $html       .= '</div>';

    return $html;
}
