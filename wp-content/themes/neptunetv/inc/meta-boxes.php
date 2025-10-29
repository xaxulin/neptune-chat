<?php
/**
 * Custom meta boxes for Neptune products.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return the schema of product meta fields.
 *
 * @return array<string, array<string, mixed>>
 */
function neptune_product_meta_schema() {
    return [
        '_ntv_product_subtitle' => [
            'label'       => __( 'Subtitle', 'neptunetv' ),
            'type'        => 'text',
            'description' => __( 'Short supporting line that appears beneath the product title.', 'neptunetv' ),
        ],
        '_ntv_product_price'    => [
            'label'       => __( 'Headline Price', 'neptunetv' ),
            'type'        => 'text',
            'description' => __( 'Displayed as the prominent price tag inside product cards. Include currency symbol if desired.', 'neptunetv' ),
        ],
        '_ntv_product_cta_label' => [
            'label'       => __( 'Primary CTA Label', 'neptunetv' ),
            'type'        => 'text',
            'description' => __( 'Defaults to “View details” when left empty.', 'neptunetv' ),
        ],
        '_ntv_product_cta_link' => [
            'label'       => __( 'Primary CTA URL', 'neptunetv' ),
            'type'        => 'url',
            'description' => __( 'Leave empty to link to the product details page.', 'neptunetv' ),
        ],
        '_ntv_product_highlights' => [
            'label'       => __( 'Highlights', 'neptunetv' ),
            'type'        => 'textarea',
            'description' => __( 'Enter one selling point per line. Each line will become a bullet point.', 'neptunetv' ),
        ],
    ];
}

/**
 * Register product meta boxes.
 */
function neptune_product_add_meta_boxes() {
    add_meta_box(
        'ntv_product_details',
        __( 'Product Details', 'neptunetv' ),
        'neptune_render_product_details_meta_box',
        'ntv_product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'neptune_product_add_meta_boxes' );

/**
 * Render the product details meta box.
 *
 * @param WP_Post $post Current post object.
 */
function neptune_render_product_details_meta_box( $post ) {
    wp_nonce_field( 'ntv_product_meta_nonce', 'ntv_product_meta_nonce_field' );

    $schema = neptune_product_meta_schema();

    echo '<div class="ntv-product-meta-fields">';
    foreach ( $schema as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        $field_id = esc_attr( $key );
        $label    = esc_html( $field['label'] );
        $desc     = ! empty( $field['description'] ) ? esc_html( $field['description'] ) : '';

        echo '<div class="ntv-product-meta-field ntv-product-meta-field--' . esc_attr( $field['type'] ) . '">';
        echo '<label for="' . $field_id . '"><strong>' . $label . '</strong></label>';

        switch ( $field['type'] ) {
            case 'textarea':
                printf(
                    '<textarea id="%1$s" name="%1$s" rows="5" class="widefat">%2$s</textarea>',
                    $field_id,
                    esc_textarea( $value )
                );
                break;
            case 'url':
                printf(
                    '<input type="url" id="%1$s" name="%1$s" class="widefat" value="%2$s" />',
                    $field_id,
                    esc_attr( $value )
                );
                break;
            default:
                printf(
                    '<input type="text" id="%1$s" name="%1$s" class="widefat" value="%2$s" />',
                    $field_id,
                    esc_attr( $value )
                );
                break;
        }

        if ( $desc ) {
            echo '<p class="description">' . $desc . '</p>';
        }
        echo '</div>';
    }

    $specs = get_post_meta( $post->ID, '_ntv_product_specs', true );

    echo '<div class="ntv-product-meta-field ntv-product-meta-field--editor">';
    echo '<label for="ntv_product_specs"><strong>' . esc_html__( 'Detailed Specifications', 'neptunetv' ) . '</strong></label>';
    wp_editor( $specs, 'ntv_product_specs', [
        'textarea_name' => 'ntv_product_specs',
        'textarea_rows' => 8,
        'media_buttons' => false,
        'teeny'         => true,
    ] );
    echo '<p class="description">' . esc_html__( 'Displayed on the product detail page beneath the highlights.', 'neptunetv' ) . '</p>';
    echo '</div>';

    echo '</div>';
}

/**
 * Persist product meta box data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function neptune_save_product_meta( $post_id ) {
    if ( ! isset( $_POST['ntv_product_meta_nonce_field'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ntv_product_meta_nonce_field'] ) ), 'ntv_product_meta_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'ntv_product' === $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    $schema = neptune_product_meta_schema();

    foreach ( $schema as $key => $field ) {
        $posted_value = isset( $_POST[ $key ] ) ? wp_unslash( $_POST[ $key ] ) : null;

        if ( null === $posted_value ) {
            delete_post_meta( $post_id, $key );
            continue;
        }

        switch ( $field['type'] ) {
            case 'textarea':
                $sanitized = sanitize_textarea_field( $posted_value );
                break;
            case 'url':
                $sanitized = esc_url_raw( $posted_value );
                break;
            default:
                $sanitized = sanitize_text_field( $posted_value );
                break;
        }

        update_post_meta( $post_id, $key, $sanitized );
    }

    if ( isset( $_POST['ntv_product_specs'] ) ) {
        $specs = wp_kses_post( wp_unslash( $_POST['ntv_product_specs'] ) );
        if ( ! empty( $specs ) ) {
            update_post_meta( $post_id, '_ntv_product_specs', $specs );
        } else {
            delete_post_meta( $post_id, '_ntv_product_specs' );
        }
    }
}
add_action( 'save_post_ntv_product', 'neptune_save_product_meta' );
