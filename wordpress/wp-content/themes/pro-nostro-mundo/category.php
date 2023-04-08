<?php
get_header();
$post = get_queried_object();
setup_postdata($post);
$post->title = esc_html__( "Kategorie: ", "pnm" ) . $post->name;
?>

<div id="body-content" class="pt-24 md:pt-28">
    <?php the_breadcrumbs("primary_menu");?>
    <div class="pnm-page-title alignfull mb-3 xl:mb-12">
        <hr class="pnm-hr-accent !border-t-pnm-accent !mt-6 !mb-2">
        <h1 class="has-x-large-font-size mt-0"><?= $post->title ?></h1>
    </div>
    <?= get_template_part( "template-parts/blocks/article-list/layout", "", array(
        "categories" => $post->term_id
    )); ?>
</div>

<?php
get_footer();
?>