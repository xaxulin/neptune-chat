<?php
/**
 * Archive template for Neptune products.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$current_term  = get_queried_object();
$is_taxonomy   = $current_term instanceof WP_Term;
$current_slug  = $is_taxonomy ? $current_term->slug : 'all';
$current_name  = $is_taxonomy ? $current_term->name : __( 'All Products', 'neptunetv' );
$catalog_terms = get_terms(
    [
        'taxonomy'   => 'ntv_product_category',
        'hide_empty' => true,
    ]
);
?>
<section class="ntv-archive ntv-archive--products">
    <div class="container">
        <header class="ntv-archive__header">
            <span class="ntv-section__eyebrow"><?php esc_html_e( 'Neptune™ product catalog', 'neptunetv' ); ?></span>
            <h1 class="ntv-archive__title"><?php echo esc_html( $current_name ); ?></h1>
            <?php if ( ! empty( $current_term->description ) ) : ?>
                <p class="ntv-archive__description"><?php echo wp_kses_post( wpautop( $current_term->description ) ); ?></p>
            <?php else : ?>
                <p class="ntv-archive__description"><?php esc_html_e( 'Discover outdoor displays engineered for every exposure, environment, and entertainment vision.', 'neptunetv' ); ?></p>
            <?php endif; ?>
            <div class="ntv-archive__filters" role="navigation" aria-label="<?php esc_attr_e( 'Product categories', 'neptunetv' ); ?>">
                <a class="ntv-pill <?php echo ( 'all' === $current_slug ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'All', 'neptunetv' ); ?></a>
                <?php
                if ( ! is_wp_error( $catalog_terms ) && $catalog_terms ) {
                    foreach ( $catalog_terms as $term ) {
                        $is_active = $current_slug === $term->slug;
                        printf(
                            '<a class="ntv-pill %1$s" href="%2$s">%3$s</a>',
                            $is_active ? 'is-active' : '',
                            esc_url( get_term_link( $term ) ),
                            esc_html( $term->name )
                        );
                    }
                }
                ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="ntv-product-grid columns-3">
                <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content', 'product-card' );
                }
                ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <div class="ntv-archive__empty">
                <h2><?php esc_html_e( 'No products match your selection', 'neptunetv' ); ?></h2>
                <p><?php esc_html_e( 'Try browsing another category or check back soon for new outdoor innovations.', 'neptunetv' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
