<?php
$post = $args["post"];
setup_postdata($post);
?>

<div class="pnm-article-card flex flex-col gap-y-10 justify-between cursor-pointer">
    <div class="pnm-article-top-content">
        <h3 class="text-xl md:text-2xl text-pnm-accent mt-0"><?= the_title() ?></h3>
        <?php
        $author = get_the_author_meta("first_name") . " " . get_the_author_meta("last_name");
        if ($author == " ") {
            $author = get_the_author_meta("display_name");
        }
        $author_link = get_author_posts_url(get_the_author_meta("ID"));
        $author_markup = "<a href='{$author_link}'>{$author}</a>";
        $date = get_the_date();
        ?>
        <p class="opacity-75 text-sm mt-2"><?= sprintf(esc_html__("Von %s", "pnm"), $author_markup)?> | <?= $date ?></p>
    </div>
    <div class="pnm-article-bottom-content">
        <?= the_excerpt() ?>
        <a class="pnm-card-readmore mt-4 text-pnm-accent !no-underline block" href="<?= the_permalink(  ) ?>">Weiterlesen <i class="icofont-rounded-right inline-block"></i></a>
    </div>
</div>

<?php
wp_reset_postdata();
?>