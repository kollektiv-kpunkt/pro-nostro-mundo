<?php

// ACF

function pnm_acf() {

    add_filter('acf/settings/save_json', 'set_acf_json_save_folder');
    function set_acf_json_save_folder( $path ) {
        $path = get_stylesheet_directory() . '/lib/acf-json';
        return $path;
    }
    add_filter('acf/settings/load_json', 'add_acf_json_load_folder');
    function add_acf_json_load_folder( $paths ) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/lib/acf-json';
        return $paths;
    }

    $blocks = glob(get_template_directory() . '/template-parts/blocks/*', GLOB_ONLYDIR);

    foreach($blocks as $block) {
        add_action( 'init', function() use ($block) {
            register_block_type( $block );
        });
    }

    if ($_ENV["APP_ENV"] === "production") {
        add_filter('acf/settings/show_admin', '__return_false');
        // add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
        // function my_acf_settings_show_admin( $show_admin ) {
        //     return false;
        // }
    }
}

pnm_acf();
