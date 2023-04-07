<?php
get_header("single");
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="body-content">

    <?php if (has_post_thumbnail( )) : ?>
        <?= get_template_part( "template-parts/elements/single-heroine-image") ?>
    <?php else: ?>
        <?= get_template_part( "template-parts/elements/single-heroine") ?>
    <?php endif; ?>

    <div class="single-columns flex w-full pnm-container alignsingle justify-center flex-col md:flex-row mt-12 md:mt-20">
        <div class="pnm-container alignsingle-aside">
            <?php get_template_part( "template-parts/elements/social-share", "", array("position" => "relative", "single" => true)); ?>
            <div class="text-xs opacity-75 pnm-single-categories-list">
                <?= get_the_category_list(', '); ?>
            </div>
        </div>
        <div id="post-content">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; endif; ?>

<?php
get_footer();
?>