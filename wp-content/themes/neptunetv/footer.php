<?php
/**
 * Theme footer.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
    </main>
    <footer class="site-footer">
        <div class="site-footer__top container">
            <div class="site-footer__brand">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <span class="site-footer__title"><?php bloginfo( 'name' ); ?></span>
                    <?php
                }
                $footer_tagline = get_theme_mod(
                    'neptune_footer_tagline',
                    __( 'All-season outdoor entertainment backed by Neptune™ innovation and the trusted engineering of Peerless-AV®.', 'neptunetv' )
                );
                if ( $footer_tagline ) {
                    echo '<p class="site-footer__tagline">' . esc_html( $footer_tagline ) . '</p>';
                }
                ?>
                <a class="ntv-button ntv-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                    <?php esc_html_e( 'Connect with our team', 'neptunetv' ); ?>
                </a>
            </div>
            <div class="site-footer__menus">
                <div class="site-footer__menu">
                    <h4><?php esc_html_e( 'Explore', 'neptunetv' ); ?></h4>
                    <?php
                    wp_nav_menu(
                        [
                            'theme_location' => 'footer',
                            'menu_class'     => 'menu menu--footer',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]
                    );
                    ?>
                </div>
                <div class="site-footer__menu">
                    <h4><?php esc_html_e( 'Product Catalog', 'neptunetv' ); ?></h4>
                    <ul class="menu menu--footer">
                        <?php
                        $catalog_terms = get_terms(
                            [
                                'taxonomy'   => 'ntv_product_category',
                                'hide_empty' => true,
                            ]
                        );
                        if ( ! is_wp_error( $catalog_terms ) && $catalog_terms ) {
                            foreach ( $catalog_terms as $term ) {
                                echo '<li class="menu-item"><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
                            }
                        } else {
                            echo '<li class="menu-item"><a href="' . esc_url( home_url( '/products/' ) ) . '">' . esc_html__( 'All Products', 'neptunetv' ) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="site-footer__menu">
                    <h4><?php esc_html_e( 'Contact', 'neptunetv' ); ?></h4>
                    <ul class="site-footer__contact">
                        <li><?php esc_html_e( '800.865.2112', 'neptunetv' ); ?></li>
                        <li><a href="mailto:sales@peerless-av.com">sales@peerless-av.com</a></li>
                        <li><?php esc_html_e( '2300 White Oak Circle, Aurora, IL 60502 USA', 'neptunetv' ); ?></li>
                    </ul>
                    <div class="site-footer__social">
                        <a href="https://www.facebook.com/peerlessav/" aria-label="Facebook" target="_blank" rel="noopener noreferrer">Fb</a>
                        <a href="https://www.instagram.com/peerlessav/" aria-label="Instagram" target="_blank" rel="noopener noreferrer">Ig</a>
                        <a href="https://www.linkedin.com/company/peerless-av/" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">In</a>
                        <a href="https://www.youtube.com/user/PeerlessAV" aria-label="YouTube" target="_blank" rel="noopener noreferrer">Yt</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer__bottom">
            <div class="container site-footer__bottom-inner">
                <p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'neptunetv' ); ?></p>
                <div class="site-footer__policies">
                    <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'neptunetv' ); ?></a>
                    <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'neptunetv' ); ?></a>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
