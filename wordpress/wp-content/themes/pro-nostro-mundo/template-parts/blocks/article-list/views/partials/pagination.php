<?php
$query = $args["query"];
$list_id = $args["list_id"];
if (!in_array($query->query_vars["posts_per_page"], array(5,10,15,20))) {
    $markup = "<option value='{$query->query_vars["posts_per_page"]}'>{$query->query_vars["posts_per_page"]}</option>";
}
?>
<div class="pnm-articles-pagination mt-12 flex justify-between gap-4 opacity-75 text-xs">
    <div class="pnm-articles-select-ppp">
        <label for="pnm-articles-select-ppp">Artikel pro Seite</label>
        <select name="pnm-articles-select-ppp" id="pnm-articles-select-ppp">
            <?= $markup ?>
            <option value="5" <?= ($query->query_vars["posts_per_page"] == 5) ? "selected" : "" ?>>5</option>
            <option value="10" <?= ($query->query_vars["posts_per_page"] == 10) ? "selected" : "" ?>>10</option>
            <option value="20" <?= ($query->query_vars["posts_per_page"] == 20) ? "selected" : "" ?>>20</option>
            <option value="50" <?= ($query->query_vars["posts_per_page"] == 50) ? "selected" : "" ?>>50</option>
            <option value="100" <?= ($query->query_vars["posts_per_page"] == 100) ? "selected" : "" ?>>100</option>
        </select>
    </div>
    <div class="pnm-articles-pagination-links flex gap-2">
        <?php
        echo paginate_links( array(
            'current' => max( 1, get_query_var('paged') ),
            'total' => $query->max_num_pages,
            "base" => get_pagenum_link(1) . "page/%#%#{$list_id}"
        ) );
        ?>
    </div>
</div>