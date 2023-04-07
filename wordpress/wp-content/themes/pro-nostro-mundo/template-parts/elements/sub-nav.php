<?php
$args = wp_parse_args(
    $args,
    array(
        "menu" => "primary_menu",
        "parent" => get_queried_object()->ID,
        "text-color" => "text-pnm-accent",
        "bg_color" => "bg-pnm-accent-10",
    )
);
$items = get_nav_subitems_by_location( $args['menu'], $args['parent'] );
if ( false === $items ) {
    return;
}
?>

<div class="pnm-container alignwide md:hidden">
    <a href="#" class="pnm-subnav-toggle !no-underline text-pnm-accent"><i class="icofont-listing-box"></i> <?= esc_html__("Mehr", "pnm") ?></a>
</div>
<div class="pnm-subnav-container !w-full !max-w-none !p-0">
    <div class="pnm-subnav-menu <?= $args["text-color"] ?> <?= $args["bg_color"] ?>">
        <?php foreach ($items as $item) : ?>
            <a href="<?= $item->url ?>" class="pnm-subnav-item"><?= $item->title ?></a>
        <?php endforeach; ?>
    </div>
</div>