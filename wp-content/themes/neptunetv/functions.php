<?php
/**
 * NeptuneTV theme bootstrap file.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'NEPTUNE_THEME_VERSION', '1.0.0' );
define( 'NEPTUNE_THEME_DIR', get_template_directory() );
define( 'NEPTUNE_THEME_URI', get_template_directory_uri() );

$neptune_includes = [
    'setup.php',
    'assets.php',
    'custom-post-types.php',
    'meta-boxes.php',
    'template-tags.php',
    'shortcodes.php',
    'customizer.php',
];

foreach ( $neptune_includes as $file ) {
    $path = NEPTUNE_THEME_DIR . '/inc/' . $file;

    if ( file_exists( $path ) ) {
        require_once $path;
    }
}
