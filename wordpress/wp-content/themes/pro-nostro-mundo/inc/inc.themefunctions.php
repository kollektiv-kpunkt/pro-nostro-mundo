<?php

function pnm_element_shortcode($atts, $content = null) {
    ob_start();
    get_template_part("template-parts/elements/" . $atts['element']);
    return ob_get_clean();
}

add_shortcode('pnm-element', 'pnm_element_shortcode');


/**
 * Return Breadcrump for current page
 */

function pnm_get_menu_item( $field, $object_id, $items ){
    foreach( $items as $item ){
        if( $item->$field == $object_id ) return $item;
    }
    return false;
}

function the_breadcrumbs( $args = array() ){
    // get menu items by menu id, slug, name, or object
    $args = wp_parse_args($args, array(
        "menu" => "primary_menu",
        "text-color" => "text-black",
        "opacity" => "opacity-60"
    ));
    $items = get_nav_menu_items_by_location( $args['menu'] );
    if( false === $items ){
        return;
    }
    // get the menu item for the current page
    $item = pnm_get_menu_item( 'object_id', get_queried_object_id(), $items );
    if( false === $item ){
        return;
    }
    // start an array of objects for the crumbs
    $menu_item_objects = array( $item );
    // loop over menu items to get the menu item parents
    while( 0 != $item->menu_item_parent ){
        $item = pnm_get_menu_item( 'ID', $item->menu_item_parent, $items );
        array_unshift( $menu_item_objects, $item );
    }
    // output crumbs
    $crumbs = array();
    $link = '<a href="%s">%s</a>';
    $crumbs[] = sprintf( $link, home_url(), get_bloginfo('name') );
    $i = 0;
    foreach( $menu_item_objects as $menu_item ){
        $page_id = $menu_item->object_id;
        $title = (get_field("breadcrumb_title", $page_id)) ? get_field("breadcrumb_title", $page_id) : $menu_item->title;
        if ($i == count($menu_item_objects) - 1) {
            $link = '<span>%s</span>';
            $crumbs[] = sprintf( $link, $title );
            continue;
        }
        if ( '#' == $menu_item->url ) {
            $link = '<span>%s</span>';
            $crumbs[] = sprintf( $link, $title );
        } else {
            $link = '<a href="%s">%s</a>';
            $crumbs[] = sprintf( $link, $menu_item->url, $title );
        }
        $i++;
    }
    $crumbs = join( '<i class="icofont-rounded-right mx-1"></i>', $crumbs );
    $classes = join( ' ', array( $args['text-color'], $args['opacity'] ) );
    $container = <<<EOD
    <div class="pnm-breadcrumbs pnm-container alignwide text-sm mt-6 md:mt-12 {$classes}">%s</div>
    EOD;
    echo sprintf( $container, $crumbs );
}

/**
 * Return Subitems of page in menu by location
 *
 * $args = array(
 * 'menu' => 'primary_menu',
 * 'parent' => get_queried_object()->ID
 * );
 */

function get_nav_subitems_by_location($args = array())
{
    $args = wp_parse_args($args, array(
        "menu" => "primary_menu",
        "parent" => get_queried_object()->ID
    ));
    $items = get_nav_menu_items_by_location($args['menu']);
    if (false === $items) {
        return;
    }
    $parentID = pnm_get_menu_item( 'object_id', $args["parent"], $items )->ID;
    $subitems = array();
    foreach ($items as $item) {
        if ($item->menu_item_parent == $parentID) {
            $subitems[] = $item;
        }
    }
    return $subitems;
}