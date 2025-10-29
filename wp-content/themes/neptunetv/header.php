<?php
/**
 * Theme header.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site-wrapper">
    <?php
    $announcement_text = get_theme_mod(
        'neptune_announcement_text',
        __( 'Neptune™ Outdoor TVs · Engineered for every season and every backyard.', 'neptunetv' )
    );
    if ( $announcement_text ) :
        ?>
        <div class="site-announcement">
            <div class="site-announcement__inner container">
                <p><?php echo esc_html( $announcement_text ); ?></p>
            </div>
        </div>
    <?php endif; ?>
    <header class="site-header">
        <div class="site-header__inner container">
            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                    <?php
                }
                ?>
            </div>
            <button class="site-header__toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'neptunetv' ); ?></span>
                <span class="site-header__toggle-bar"></span>
                <span class="site-header__toggle-bar"></span>
                <span class="site-header__toggle-bar"></span>
            </button>
            <nav id="primary-navigation" class="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'neptunetv' ); ?>">
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'primary',
                        'menu_class'     => 'menu menu--primary',
                        'container'      => false,
                        'fallback_cb'    => 'neptune_primary_menu_fallback',
                    ]
                );
                ?>
            </nav>
            <div class="site-header__actions">
                <a class="ntv-button ntv-button--ghost" href="<?php echo esc_url( home_url( '/products/' ) ); ?>">
                    <?php esc_html_e( 'View Products', 'neptunetv' ); ?>
                </a>
            </div>
        </div>
    </header>
    <main id="primary" class="site-main">
