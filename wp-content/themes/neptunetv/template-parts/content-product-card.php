<?php
/**
 * Template part for displaying product cards.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$subtitle   = neptune_get_product_subtitle();
$price      = neptune_get_product_price();
$cta        = neptune_get_product_cta();
$highlights = neptune_get_product_highlights();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'ntv-product-card' ); ?>>
    <div class="ntv-product-card__media">
        <a class="ntv-product-card__media-link" href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'neptune-product-card' ); ?>
            <?php else : ?>
                <div class="ntv-product-card__placeholder" aria-hidden="true">
                    <span><?php esc_html_e( 'Outdoor TV', 'neptunetv' ); ?></span>
                </div>
            <?php endif; ?>
        </a>
        <?php if ( $price ) : ?>
            <span class="ntv-product-card__price"><?php echo esc_html( $price ); ?></span>
        <?php endif; ?>
    </div>
    <div class="ntv-product-card__content">
        <h3 class="ntv-product-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <?php if ( $subtitle ) : ?>
            <p class="ntv-product-card__subtitle"><?php echo esc_html( $subtitle ); ?></p>
        <?php endif; ?>

        <?php if ( has_excerpt() ) : ?>
            <div class="ntv-product-card__excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $highlights ) ) : ?>
            <ul class="ntv-product-card__highlights">
                <?php foreach ( $highlights as $highlight ) : ?>
                    <li><?php echo esc_html( $highlight ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ( ! empty( $cta['label'] ) && ! empty( $cta['url'] ) ) : ?>
            <a class="ntv-button ntv-button--primary" href="<?php echo esc_url( $cta['url'] ); ?>">
                <?php echo esc_html( $cta['label'] ); ?>
            </a>
        <?php endif; ?>
    </div>
</article>
