<?php
get_header();
?>

<div id="body-content">
    <?php the_breadcrumbs("primary_menu");?>
    <div class="pnm-page-title pnm-container alignwide mb-3 xl:mb-12">
        <hr class="pnm-hr-accent !border-t-pnm-accent !mt-6 !mb-2">
        <h1 class="has-x-large-font-size"><?php the_title(); ?></h1>
    </div>
    <?php get_template_part( "template-parts/elements/social-share"); ?>
    <?php the_content(); ?>
</div>

<?php
get_footer();
?>