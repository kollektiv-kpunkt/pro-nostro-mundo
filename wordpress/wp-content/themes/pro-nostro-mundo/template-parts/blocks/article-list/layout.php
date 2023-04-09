<?php
/**
 * Article List Block
 *
 * @package WordPress
 * @subpackage ProNostroMundo
 * @since ProNostroMundo 1.0
 */

if (!isset($args)) {
    $args = array();
}

$params = array(
    "post_type" => "post",
    "posts_per_page" => 6,
    "orderby" => "date",
    "order" => "DESC",
    "categories" => array(),
    "authors" => array()
);

$query_args = array();

foreach ($params as $key => $value) {
    if (isset($args[$key])) {
        $query_args[$key] = $args[$key];
    } else if (get_field($key)) {
        $query_args[$key] = get_field($key);
    } else {
        $query_args[$key] = $value;
    }

    if (isset($_GET["query"][$key])) {
        $query_args[$key] = $_GET["query"][$key];
    }
}


if (get_field("pagination") === array()) {
    $query_args["posts_per_page"] = -1;
}

if (in_array(gettype($query_args["categories"]), array("string", "integer"))) {
    $query_args["categories"] = explode(",", $query_args["categories"]);
}

if (in_array(gettype($query_args["authors"]), array("string", "integer"))) {
    $query_args["authors"] = explode(",", $query_args["authors"]);
}

if (count($query_args["categories"]) > 0) {
    $query_args["tax_query"] = array(
        array(
            'taxonomy' => 'category',
            'field' => "term_id",
            'terms' => $query_args["categories"],
        )
    );
}

if (count($query_args["authors"]) > 0) {
    $query_args["author__in"] = $query_args["authors"];
}

$args = array(
    "view" => get_field("view") ?? $args['view'] ?? "cards",
    "search_bar" => get_field("search_bar") ?? $args['search_bar'] ?? false
);

$query_args["paged"] = (get_query_var("paged")) ? get_query_var("paged") : 1;

$query_args["s"] = $_GET["query"]["s"] ?? "";

$query_args["date_query"] = array(
    "after" => $_GET["query"]["startdate"] ?? "",
    "before" => $_GET["query"]["enddate"] ?? "",
    "inclusive" => true
);

if (isset($_GET["query"]["post_tags"])) {
    $query_args["tax_query"][] = array(
        'taxonomy' => 'post_tag',
        'field' => "term_id",
        'terms' => explode(",",$_GET["query"]["post_tags"]),
        "operator" => "IN"
    );
}


// echo "<pre class='text-xs'>";
// print_r($query_args);
// echo "</pre>";


$the_query = new WP_Query( $query_args );
if (isset($block)) {
    $list_id = "pnm-article-list-" . explode("_", $block["id"])[1];
} else {
    $list_id = "pnm-article-list-" . base64_encode($wp->request);
}
?>

<div class="pnm-article-list-container pnm-container alignwide<?= (isset($block["className"])) ? " " . $block["className"] : "" ?>">
    <?= ((get_field("search_bar") && in_array(1, get_field("search_bar"))) || $args['search_bar'] == true) ? get_template_part( "template-parts/blocks/article-list/views/partials/search-bar") : ""; ?>
    <?php if (!$the_query->have_posts()) : ?>
        <div class="pnm-article-list-empty">
            <h2 class="text-center"><?= esc_html__( "Keine Artikel gefunden", "pnm" ) ?></h2>
        </div>
    <?php endif ?>
    <div class="pnm-article-list-content pt-8 md:pt-12" id="<?= $list_id ?>">
        <?= get_template_part( "template-parts/blocks/article-list/views/{$args["view"]}", "", array(
            "query" => $the_query
        ));  ?>
    </div>
    <?php if ($the_query->max_num_pages > 1) : ?>
        <?= get_template_part( "template-parts/blocks/article-list/views/partials/pagination", "", array(
            "query" => $the_query,
            "list_id" => $list_id
        )); ?>
    <?php endif ?>
</div>