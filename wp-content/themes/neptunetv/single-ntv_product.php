<?php
/**
 * Single Neptune product template.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
<section class="ntv-single-product">
    <?php
    while ( have_posts() ) {
        the_post();
        $subtitle    = neptune_get_product_subtitle();
        $price       = neptune_get_product_price();
        $cta         = neptune_get_product_cta();
        $highlights  = neptune_get_product_highlights();
        $specs       = neptune_get_product_specs();
        $hero_image  = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'neptune-hero' ) : NEPTUNE_THEME_URI . '/assets/images/hero.png';
        $categories  = get_the_terms( get_the_ID(), 'ntv_product_category' );
        ?>
        <div class="ntv-product-hero" style="<?php echo $hero_image ? 'background-image: url(' . esc_url( $hero_image ) . ');' : ''; ?>">
            <div class="ntv-product-hero__overlay"></div>
            <div class="container ntv-product-hero__content">
                <?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
                    <div class="ntv-product-hero__breadcrumb">
                        <?php echo esc_html( implode( ' · ', wp_list_pluck( $categories, 'name' ) ) ); ?>
                    </div>
                <?php endif; ?>
                <h1 class="ntv-product-hero__title"><?php the_title(); ?></h1>
                <?php if ( $subtitle ) : ?>
                    <p class="ntv-product-hero__subtitle"><?php echo esc_html( $subtitle ); ?></p>
                <?php endif; ?>
                <?php if ( $price ) : ?>
                    <span class="ntv-product-hero__price"><?php echo esc_html( $price ); ?></span>
                <?php endif; ?>
                <div class="ntv-product-hero__actions">
                    <?php if ( ! empty( $cta['label'] ) && ! empty( $cta['url'] ) ) : ?>
                        <a class="ntv-button ntv-button--primary" href="<?php echo esc_url( $cta['url'] ); ?>"><?php echo esc_html( $cta['label'] ); ?></a>
                    <?php endif; ?>
                    <a class="ntv-button ntv-button--ghost" href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Back to catalog', 'neptunetv' ); ?></a>
                </div>
            </div>
        </div>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'ntv-product-detail container' ); ?>>
            <div class="ntv-product-detail__body">
                <div class="ntv-product-detail__copy">
                    <?php the_content(); ?>
                </div>
                <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="ntv-product-detail__image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </figure>
                <?php endif; ?>
            </div>
            <?php if ( ! empty( $highlights ) ) : ?>
                <section class="ntv-product-detail__highlights">
                    <h2><?php esc_html_e( 'Key features', 'neptunetv' ); ?></h2>
                    <ul>
                        <?php foreach ( $highlights as $highlight ) : ?>
                            <li><?php echo esc_html( $highlight ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if ( $specs ) : ?>
                <section class="ntv-product-detail__specs">
                    <h2><?php esc_html_e( 'Specifications', 'neptunetv' ); ?></h2>
                    <?php echo $specs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </section>
            <?php endif; ?>
        </article>

        <?php
        $related = new WP_Query(
            [
                'post_type'      => 'ntv_product',
                'posts_per_page' => 3,
                'post__not_in'   => [ get_the_ID() ],
                'orderby'        => 'rand',
            ]
        );

        if ( $related->have_posts() ) :
            ?>
            <section class="ntv-section ntv-section--related">
                <div class="container">
                    <header class="ntv-section__header">
                        <h2><?php esc_html_e( 'You may also like', 'neptunetv' ); ?></h2>
                    </header>
                    <div class="ntv-product-grid columns-3">
                        <?php
                        while ( $related->have_posts() ) {
                            $related->the_post();
                            get_template_part( 'template-parts/content', 'product-card' );
                        }
                        ?>
                    </div>
                </div>
            </section>
            <?php
            wp_reset_postdata();
        endif;
    }
    ?>
</section>
<?php
get_footer();
