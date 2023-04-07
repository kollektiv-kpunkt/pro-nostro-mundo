<div class="single-page-heroine-container pt-24 <?= (has_post_thumbnail(  )) ? "pb-40" : "pb-12" ?> md:pt-28 bg-pnm-accent">
    <div class="single-header-content-container pnm-container alignnarrow mt-8 text-center text-white">
        <div class="single-header-content-details flex justify-center text-xs gap-x-4 px-4 border-b-4 border-b-pnm-foreground w-fit mx-auto pb-2 mb-4">
            <?php
            $author = get_the_author_meta("first_name") . " " . get_the_author_meta("last_name");
            if ($author == " ") {
                $author = get_the_author_meta("display_name");
            }
            $author_link = get_author_posts_url(get_the_author_meta("ID"));
            $date = get_the_date();
            ?>
            <span class="opacity-75"><i class="icofont-ui-user mr-2"></i><a href="<?= $author_link ?>"><?= $author ?></a></span>
            <span class="opacity-75"><i class="icofont-ui-calendar mr-2"></i><?= $date ?></span>
        </div>
        <h1 class="mt-0"><?= the_title() ?></h1>
    </div>
</div>
<?php if (has_post_thumbnail(  )) : ?>
    <div class="single-header-thumbnail-container pnm-container alignsingle">
        <div class="single-header-thumbnail">
            <?= the_post_thumbnail("large", array("class" => "w-full h-auto")); ?>
        </div>
    </div>
<?php endif; ?>