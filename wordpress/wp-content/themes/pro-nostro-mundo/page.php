<?php
get_header();
?>

<div id="body-content" class="pt-24 md:pt-28">
    <?php the_breadcrumbs("primary_menu");?>
    <div class="pnm-page-title pnm-container alignwide mb-3 xl:mb-12">
        <hr class="pnm-hr-accent !border-t-pnm-accent !mt-6 !mb-2">
        <h1 class="has-2-x-large-font-size mt-0"><?php the_title(); ?></h1>
    </div>
    <?php if (get_nav_subitems_by_location()) : ?>
        <?= get_template_part( "template-parts/elements/sub-nav", null, array("menu" => "primary_menu", "parent" => get_queried_object()->ID) ); ?>
    <?php endif; ?>
    <?php if (in_array("1", get_field("social_share"))) : ?>
        <?= get_template_part( "template-parts/elements/social-share"); ?>
    <?php endif; ?>
    <?php the_content(); ?>
</div>

<?php
get_footer();
?>