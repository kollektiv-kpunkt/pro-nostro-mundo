<?php
function pnm_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_editor_style('gutenberg/fixes.css' );
    add_theme_support( "editor-color-palette", array(
        [
            "slug" => "pnm-accent",
            "color" => "#00A09A",
            "name" => __("Accent Color", "pnm")
        ],
        [
            "slug" => "pnm-accent-half",
            "color" => "#99CECC",
            "name" => __("Accent Color half", "pnm")
        ],
        [
            "slug" => "pnm-foreground",
            "color" => "#222221",
            "name" => __("Foreground Color", "pnm")
        ],
        [
            "slug" => "pnm-foreground-half",
            "color" => "#909090",
            "name" => __("Foreground Color half", "pnm")
        ],
        [
            "slug" => "pnm-secondary",
            "color" => "#005286",
            "name" => __("Secondary Color", "pnm")
        ],
        [
            "slug" => "pnm-tertiary",
            "color" => "#F08159",
            "name" => __("Tertiary Color", "pnm")
        ],
        [
            "slug"=> "white",
            "color"=> "#FFFFFF",
            "name"=> __("White", "pnm")
        ]
    ));

    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('Small', 'pnm'),
            'size' => 16,
            'slug' => 'small'
        ),
        array(
            'name' => __('Medium', 'pnm'),
            'size' => "1.15rem",
            'slug' => 'medium'
        ),
        array(
            'name' => __('Large', 'pnm'),
            'size' => "1.3rem",
            'slug' => 'medium'
        ),
        array(
            'name' => __('X-Large', 'pnm'),
            'size' => "2.25rem",
            'slug' => 'x-large'
        ),
        array(
            'name' => __('2x-Large', 'pnm'),
            'size' => "3rem",
            'slug' => '2x-large'
        )
    ));

    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'pnm' ),
        'footer_menu'  => __( 'Footer Menu', 'pnm' ),
        "some_menu" => __("Social Media Menu", "pnm")
    ) );

    $textdomain = load_theme_textdomain( 'pnm', get_template_directory() . '/languages' );
    if (!$textdomain) {
        add_action( 'admin_notices', function() {
            echo '<div class="error"><p>' . __( 'Error loading textdomain for theme "pnm"', 'pnm' ) . '</p></div>';
        });
    }

    function replace_anchor_mailto_tags_with_js($content) {
        $links = array();
        preg_match_all('/<a([^>]+)href="mailto:([^>]+)"([^>]*)>/i', $content, $links);
        if (isset($links[2])) {
            foreach ($links[2] as $link) {
                $base64 = base64_encode($link);
                $script = <<<EOD
                javascript:window.open(`mailto:`.concat(atob(`{$base64}`)));
                EOD;
                $content = str_replace("href='mailto:{$link}", "href='{$script}'", $content);
                $content = str_replace('href="mailto:' . $link, 'href="' . $script . '"', $content);
            }
        }
        return $content;
    }
    add_filter("the_content", "replace_anchor_mailto_tags_with_js");
}

add_action( 'after_setup_theme', 'pnm_theme_support' );

function get_nav_menu_items_by_location( $location, $args = [] ) {

    // Get all locations
    $locations = get_nav_menu_locations();

    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );

    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );

    // Return menu post objects
    return $menu_items;
}


include_once(__DIR__ ."/inc.polylang_nav_menu.php");