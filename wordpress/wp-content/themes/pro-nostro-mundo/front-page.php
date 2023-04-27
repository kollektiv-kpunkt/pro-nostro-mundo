<?php
// TODO: Remove these lines when the site is translated
if (pll_current_language() == "fr") {
    wp_redirect("https://www.notre-bns.ch/");
}
?>
<?php get_header();?>

<div id="body-content" class="pt-24 md:pt-28">
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>