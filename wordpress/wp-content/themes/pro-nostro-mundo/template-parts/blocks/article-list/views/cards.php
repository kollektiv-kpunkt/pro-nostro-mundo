<?php
$args = wp_parse_args($args, array(
    "query" => ""
));
?>


<div class="pnm-article-cards flex flex-wrap justify-start">
    <?php while ($args["query"]->have_posts()) : $args["query"]->the_post(); ?>
        <?php get_template_part("template-parts/blocks/article-list/views/partials/card", "", array(
            "post" => get_post()
        )); ?>
    <?php endwhile; ?>
</div>
