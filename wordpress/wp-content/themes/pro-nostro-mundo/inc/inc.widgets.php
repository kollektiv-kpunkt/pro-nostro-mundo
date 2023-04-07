<?php
function pnm_widgets_init() {

    $langs = pll_the_languages(array('raw'=>1));

    foreach ($langs as $lang) {
        register_sidebar( array(
            'name'          => __('Footer Widget', "pnm") . ' - ' . $lang['name'],
            'id'            => 'footer_widget_' . $lang['slug'],
            'before_widget' => '<div class="pnm-footer-widget">',
            'after_widget'  => '</div>'
        ) );
    }

}
add_action( 'widgets_init', 'pnm_widgets_init' );