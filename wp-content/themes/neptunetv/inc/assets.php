<?php
/**
 * Theme assets.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'neptune_enqueue_assets' ) ) {
    /**
     * Register and enqueue front-end assets.
     */
    function neptune_enqueue_assets() {
        wp_enqueue_style( 'neptunetv-fonts', 'https://fonts.googleapis.com/css2?family=Abel&family=Bebas+Neue&family=Barlow:wght@400;500;600;700&display=swap', [], null );

        wp_enqueue_style( 'neptunetv-style', get_stylesheet_uri(), [], NEPTUNE_THEME_VERSION );
        wp_enqueue_style( 'neptunetv-main', NEPTUNE_THEME_URI . '/assets/css/main.css', [ 'neptunetv-style' ], NEPTUNE_THEME_VERSION );

        wp_enqueue_script( 'neptunetv-navigation', NEPTUNE_THEME_URI . '/assets/js/main.js', [], NEPTUNE_THEME_VERSION, true );
    }
}
add_action( 'wp_enqueue_scripts', 'neptune_enqueue_assets' );
