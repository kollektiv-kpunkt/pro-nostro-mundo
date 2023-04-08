<?php
get_header();
$post = get_queried_object();
setup_postdata($post);
$author = $post->first_name . " " . $post->last_name;
if ($author == " ") {
    $author = $post->display_name;
}
$post->title = esc_html__( "Autor*in: ", "pnm" ) . $author;
?>

<div id="body-content" class="pt-24 md:pt-28">
    <?php the_breadcrumbs("primary_menu");?>
    <div class="pnm-page-title alignfull mb-3 xl:mb-12">
        <hr class="pnm-hr-accent !border-t-pnm-accent !mt-6 !mb-2">
        <h1 class="has-x-large-font-size mt-0"><?= $post->title ?></h1>
    </div>
    <?= get_template_part( "template-parts/blocks/article-list/layout", "", array(
        "authors" => $post->ID
    )); ?>
</div>

<?php
get_footer();
?>