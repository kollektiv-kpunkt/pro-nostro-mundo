<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
    $classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
    $classes .= sprintf( ' align%s', $block['align'] );
}
$show_more = get_field('button_text') != "" ? get_field('button_text') : esc_html__("Mehr anzeigen", "pnm");
$show_less = get_field('button_close') != "" ? get_field('button_close') : esc_html__("Weniger anzeigen", "pnm");
$id = "show_more_" . explode("_", $block['id'])[1];
?>

<div class="pnm-showmore-block<?= $classes ?>">
    <div class="pnm-showmore-content max-h-0 overflow-hidden" id="<?= $id ?>">
        <InnerBlocks />
    </div>
    <div class="pnm-showmore-button">
        <a href="#" class="pnm-button show-more text-xs" data-more="<?= $show_more ?>" data-less="<?= $show_less ?>" data-block="<?= $id ?>"><?= $show_more ?></a>
    </div>
</div>

