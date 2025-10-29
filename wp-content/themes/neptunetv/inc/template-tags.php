<?php
/**
 * Helper template tags for the Neptune theme.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Fetch a product meta value.
 *
 * @param string   $meta_key Meta key.
 * @param int|null $post_id  Optional. Post ID.
 *
 * @return string
 */
function neptune_get_product_meta_value( $meta_key, $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();

    if ( ! $post_id ) {
        return '';
    }

    $value = get_post_meta( $post_id, $meta_key, true );

    return is_string( $value ) ? $value : '';
}

/**
 * Retrieve the product subtitle.
 *
 * @param int|null $post_id Optional. Post ID.
 *
 * @return string
 */
function neptune_get_product_subtitle( $post_id = null ) {
    return neptune_get_product_meta_value( '_ntv_product_subtitle', $post_id );
}

/**
 * Retrieve the headline product price.
 *
 * @param int|null $post_id Optional. Post ID.
 *
 * @return string
 */
function neptune_get_product_price( $post_id = null ) {
    return neptune_get_product_meta_value( '_ntv_product_price', $post_id );
}

/**
 * Retrieve the CTA data structure for a product.
 *
 * @param int|null $post_id Optional. Post ID.
 *
 * @return array{label:string,url:string}
 */
function neptune_get_product_cta( $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();

    $label = neptune_get_product_meta_value( '_ntv_product_cta_label', $post_id );
    $url   = neptune_get_product_meta_value( '_ntv_product_cta_link', $post_id );

    if ( empty( $label ) ) {
        $label = __( 'View details', 'neptunetv' );
    }

    if ( empty( $url ) ) {
        $url = $post_id ? get_permalink( $post_id ) : '#';
    }

    return [
        'label' => $label,
        'url'   => $url,
    ];
}

/**
 * Retrieve product highlights list.
 *
 * @param int|null $post_id Optional. Post ID.
 *
 * @return string[]
 */
function neptune_get_product_highlights( $post_id = null ) {
    $raw        = neptune_get_product_meta_value( '_ntv_product_highlights', $post_id );
    $highlights = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $raw ) ) );

    return array_map( 'sanitize_text_field', $highlights );
}

/**
 * Retrieve product specifications markup.
 *
 * @param int|null $post_id Optional. Post ID.
 *
 * @return string
 */
function neptune_get_product_specs( $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();

    if ( ! $post_id ) {
        return '';
    }

    $content = get_post_meta( $post_id, '_ntv_product_specs', true );

    return $content ? apply_filters( 'the_content', $content ) : '';
}

/**
 * Fallback callback for the primary menu.
 */
function neptune_primary_menu_fallback() {
    echo '<ul class="menu menu--fallback">';
    echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'neptunetv' ) . '</a></li>';

    wp_list_pages(
        [
            'title_li' => '',
            'depth'    => 1,
        ]
    );

    echo '</ul>';
}
