<?php
/**
 * Shortcodes for the Neptune theme.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'neptune_product_catalog_shortcode' ) ) {
    /**
     * Render a grid of Neptune products.
     *
     * Usage: [neptune_product_catalog columns="3" category="premium" limit="6"]
     *
     * @param array<string, mixed> $atts Shortcode attributes.
     *
     * @return string
     */
    function neptune_product_catalog_shortcode( $atts ) {
        $atts = shortcode_atts(
            [
                'columns' => 3,
                'category' => '',
                'limit' => 12,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ],
            $atts,
            'neptune_product_catalog'
        );

        $columns = (int) $atts['columns'];
        $columns = max( 1, min( 4, $columns ) );

        $orderby = sanitize_key( (string) $atts['orderby'] );
        $allowed_orderby = [ 'date', 'title', 'menu_order', 'rand', 'modified' ];
        if ( ! in_array( $orderby, $allowed_orderby, true ) ) {
            $orderby = 'menu_order';
        }

        $order = strtoupper( (string) $atts['order'] );
        if ( ! in_array( $order, [ 'ASC', 'DESC' ], true ) ) {
            $order = 'ASC';
        }

        $query_args = [
            'post_type'      => 'ntv_product',
            'posts_per_page' => (int) $atts['limit'],
            'orderby'        => $orderby,
            'order'          => $order,
        ];

        if ( 'rand' === $orderby ) {
            unset( $query_args['order'] );
        }

        if ( -1 === $query_args['posts_per_page'] ) {
            $query_args['posts_per_page'] = -1;
        } elseif ( $query_args['posts_per_page'] <= 0 ) {
            $query_args['posts_per_page'] = 12;
        }

        if ( ! empty( $atts['category'] ) ) {
            $raw_terms = array_map( 'trim', explode( ',', (string) $atts['category'] ) );
            $terms     = array_filter( array_map( 'sanitize_title', $raw_terms ) );

            if ( ! empty( $terms ) ) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'ntv_product_category',
                        'field'    => 'slug',
                        'terms'    => $terms,
                    ],
                ];
            }
        }

        $catalog = new WP_Query( $query_args );

        if ( ! $catalog->have_posts() ) {
            wp_reset_postdata();
            return '<div class="ntv-product-grid ntv-product-grid--empty">' . esc_html__( 'No products available at the moment. Please check back later.', 'neptunetv' ) . '</div>';
        }

        ob_start();
        ?>
        <div class="ntv-product-grid columns-<?php echo esc_attr( $columns ); ?>">
            <?php
            while ( $catalog->have_posts() ) {
                $catalog->the_post();
                get_template_part( 'template-parts/content', 'product-card' );
            }
            ?>
        </div>
        <?php
        wp_reset_postdata();

        return ob_get_clean();
    }
}
add_shortcode( 'neptune_product_catalog', 'neptune_product_catalog_shortcode' );
