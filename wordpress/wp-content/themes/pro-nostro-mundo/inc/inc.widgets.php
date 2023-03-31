<?php
function pnm_widgets_init() {

	register_sidebar( array(
		'name'          => __('Footer Widget', "pnm"),
		'id'            => 'footer_widget',
		'before_widget' => '<div class="pnm-footer-widget">',
		'after_widget'  => '</div>'
	) );

}
add_action( 'widgets_init', 'pnm_widgets_init' );