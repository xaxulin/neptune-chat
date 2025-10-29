<?php
/**
 * Custom post types and taxonomies.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'neptune_register_product_post_type' ) ) {
    /**
     * Register the Neptune product post type and taxonomy.
     */
    function neptune_register_product_post_type() {
        $labels = [
            'name'                  => __( 'Products', 'neptunetv' ),
            'singular_name'         => __( 'Product', 'neptunetv' ),
            'menu_name'             => __( 'Products', 'neptunetv' ),
            'name_admin_bar'        => __( 'Product', 'neptunetv' ),
            'add_new'               => __( 'Add New', 'neptunetv' ),
            'add_new_item'          => __( 'Add New Product', 'neptunetv' ),
            'new_item'              => __( 'New Product', 'neptunetv' ),
            'edit_item'             => __( 'Edit Product', 'neptunetv' ),
            'view_item'             => __( 'View Product', 'neptunetv' ),
            'all_items'             => __( 'All Products', 'neptunetv' ),
            'search_items'          => __( 'Search Products', 'neptunetv' ),
            'parent_item_colon'     => __( 'Parent Products:', 'neptunetv' ),
            'not_found'             => __( 'No products found.', 'neptunetv' ),
            'not_found_in_trash'    => __( 'No products found in Trash.', 'neptunetv' ),
            'featured_image'        => __( 'Product Image', 'neptunetv' ),
            'set_featured_image'    => __( 'Set product image', 'neptunetv' ),
            'remove_featured_image' => __( 'Remove product image', 'neptunetv' ),
            'use_featured_image'    => __( 'Use as product image', 'neptunetv' ),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'show_in_rest'       => true,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-desktop',
            'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ],
            'rewrite'            => [ 'slug' => 'products', 'with_front' => false ],
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_nav_menus'  => true,
        ];

        register_post_type( 'ntv_product', $args );

        $taxonomy_labels = [
            'name'              => __( 'Product Categories', 'neptunetv' ),
            'singular_name'     => __( 'Product Category', 'neptunetv' ),
            'search_items'      => __( 'Search Categories', 'neptunetv' ),
            'all_items'         => __( 'All Categories', 'neptunetv' ),
            'parent_item'       => __( 'Parent Category', 'neptunetv' ),
            'parent_item_colon' => __( 'Parent Category:', 'neptunetv' ),
            'edit_item'         => __( 'Edit Category', 'neptunetv' ),
            'update_item'       => __( 'Update Category', 'neptunetv' ),
            'add_new_item'      => __( 'Add New Category', 'neptunetv' ),
            'new_item_name'     => __( 'New Category Name', 'neptunetv' ),
            'menu_name'         => __( 'Product Categories', 'neptunetv' ),
        ];

        $taxonomy_args = [
            'hierarchical'      => true,
            'labels'            => $taxonomy_labels,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => [ 'slug' => 'product-category', 'with_front' => false ],
        ];

        register_taxonomy( 'ntv_product_category', [ 'ntv_product' ], $taxonomy_args );
    }
}
add_action( 'init', 'neptune_register_product_post_type' );
