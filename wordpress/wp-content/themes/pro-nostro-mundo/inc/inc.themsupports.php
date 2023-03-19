<?php
function pnm_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
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
            'size' => 24,
            'slug' => 'medium'
        ),
        array(
            'name' => __('Large', 'pnm'),
            'size' => 30,
            'slug' => 'large'
        ),
        array(
            'name' => __('x-Large', 'pnm'),
            'size' => 45,
            'slug' => 'x-large'
        )
    ));

    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'pnm' ),
        'footer_menu'  => __( 'Footer Menu', 'pnm' ),
    ) );
}

add_action( 'after_setup_theme', 'pnm_theme_support' );