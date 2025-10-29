<?php
/**
 * Theme setup.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'neptune_theme_setup' ) ) {
    /**
     * Register theme defaults and support for various WordPress features.
     */
    function neptune_theme_setup() {
        load_theme_textdomain( 'neptunetv', NEPTUNE_THEME_DIR . '/languages' );

        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', [
            'search-form',
            'gallery',
            'caption',
            'script',
            'style',
        ] );
        add_theme_support( 'custom-logo', [
            'height'      => 120,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ] );
        add_theme_support( 'align-wide' );

        register_nav_menus( [
            'primary' => __( 'Primary Menu', 'neptunetv' ),
            'footer'  => __( 'Footer Menu', 'neptunetv' ),
        ] );

        add_image_size( 'neptune-hero', 1920, 1080, true );
        add_image_size( 'neptune-product-card', 800, 600, true );
    }
}
add_action( 'after_setup_theme', 'neptune_theme_setup' );
