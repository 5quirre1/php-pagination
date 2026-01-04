<?php
function render($currentpage, $totalpages) {
    echo '<div class="pagination">';

    if ($currentpage > 1) {
        echo '<a href="?page=' . ($currentpage - 1) . '">back</a>';
    }

    for ($i = 1; $i <= $totalpages; $i++) {
        $style = ($i == $currentpage) ? 'font-weight: bold; color: blue;' : '';
        echo '<a href="?page=' . $i . '" style="' . $style . '">' . $i . '</a>';
    }

    if ($currentpage < $totalpages) {
        echo '<a href="?page=' . ($currentpage + 1) . '">next</a>';
    }

    echo '</div>';
}
?>
