<?php
/**
 * Customizer settings for Neptune theme.
 *
 * @package NeptuneTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'neptune_customize_register' ) ) {
    /**
     * Register customizer panels, sections, and controls.
     *
     * @param WP_Customize_Manager $wp_customize Customizer object.
     */
    function neptune_customize_register( $wp_customize ) {
        $wp_customize->add_section(
            'neptune_global',
            [
                'title'       => __( 'Neptune™ Global Settings', 'neptunetv' ),
                'priority'    => 35,
                'description' => __( 'Update announcement bar text and footer messaging.', 'neptunetv' ),
            ]
        );

        $wp_customize->add_setting(
            'neptune_announcement_text',
            [
                'default'           => __( 'Neptune™ Outdoor TVs · Engineered for every season and every backyard.', 'neptunetv' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            ]
        );

        $wp_customize->add_control(
            'neptune_announcement_text',
            [
                'type'    => 'text',
                'label'   => __( 'Announcement bar text', 'neptunetv' ),
                'section' => 'neptune_global',
            ]
        );

        $wp_customize->add_setting(
            'neptune_footer_tagline',
            [
                'default'           => __( 'All-season outdoor entertainment backed by Neptune™ innovation and the trusted engineering of Peerless-AV®.', 'neptunetv' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            ]
        );

        $wp_customize->add_control(
            'neptune_footer_tagline',
            [
                'type'        => 'text',
                'label'       => __( 'Footer tagline', 'neptunetv' ),
                'description' => __( 'Displayed above the footer call-to-action button.', 'neptunetv' ),
                'section'     => 'neptune_global',
            ]
        );

        $wp_customize->add_section(
            'neptune_homepage_hero',
            [
                'title'       => __( 'Homepage Hero', 'neptunetv' ),
                'priority'    => 36,
                'description' => __( 'Control the content displayed in the hero on the front page.', 'neptunetv' ),
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_title',
            [
                'default'           => __( 'Neptune™ Outdoor TVs: Year-Round Entertainment Anywhere Outdoors', 'neptunetv' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            ]
        );
        $wp_customize->add_control(
            'neptune_hero_title',
            [
                'type'    => 'text',
                'label'   => __( 'Hero headline', 'neptunetv' ),
                'section' => 'neptune_homepage_hero',
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_subtitle',
            [
                'default'           => __( 'Engineered to thrive in every season with brilliant 4K UHD picture quality, smart connectivity, and the durability you expect from Peerless-AV®. Bring the big game, movie night, or streaming playlists to the great outdoors.', 'neptunetv' ),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'refresh',
            ]
        );
        $wp_customize->add_control(
            'neptune_hero_subtitle',
            [
                'type'    => 'textarea',
                'label'   => __( 'Hero supporting copy', 'neptunetv' ),
                'section' => 'neptune_homepage_hero',
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_primary_cta',
            [
                'default'           => __( 'Shop Outdoor TVs', 'neptunetv' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            ]
        );
        $wp_customize->add_control(
            'neptune_hero_primary_cta',
            [
                'type'    => 'text',
                'label'   => __( 'Primary button label', 'neptunetv' ),
                'section' => 'neptune_homepage_hero',
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_primary_url',
            [
                'default'           => home_url( '/products/' ),
                'sanitize_callback' => 'esc_url_raw',
                'transport'         => 'refresh',
            ]
        );
        $wp_customize->add_control(
            'neptune_hero_primary_url',
            [
                'type'    => 'url',
                'label'   => __( 'Primary button URL', 'neptunetv' ),
                'section' => 'neptune_homepage_hero',
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_secondary_cta',
            [
                'default'           => __( 'Why Neptune™', 'neptunetv' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            ]
        );
        $wp_customize->add_control(
            'neptune_hero_secondary_cta',
            [
                'type'    => 'text',
                'label'   => __( 'Secondary button label', 'neptunetv' ),
                'section' => 'neptune_homepage_hero',
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_secondary_url',
            [
                'default'           => '#neptune-differentiators',
                'sanitize_callback' => 'esc_url_raw',
                'transport'         => 'refresh',
            ]
        );
        $wp_customize->add_control(
            'neptune_hero_secondary_url',
            [
                'type'    => 'url',
                'label'   => __( 'Secondary button URL', 'neptunetv' ),
                'section' => 'neptune_homepage_hero',
            ]
        );

        $wp_customize->add_setting(
            'neptune_hero_image',
            [
                'default'           => 0,
                'sanitize_callback' => 'absint',
                'transport'         => 'refresh',
            ]
        );
        if ( class_exists( 'WP_Customize_Media_Control' ) ) {
            $wp_customize->add_control(
                new WP_Customize_Media_Control(
                    $wp_customize,
                    'neptune_hero_image',
                    [
                        'label'       => __( 'Hero background image', 'neptunetv' ),
                        'section'     => 'neptune_homepage_hero',
                        'mime_type'   => 'image',
                        'description' => __( 'Recommended minimum width: 1600px.', 'neptunetv' ),
                    ]
                )
            );
        } else {
            $wp_customize->add_control(
                'neptune_hero_image',
                [
                    'type'        => 'number',
                    'label'       => __( 'Hero background image attachment ID', 'neptunetv' ),
                    'section'     => 'neptune_homepage_hero',
                    'description' => __( 'Enter the attachment ID of the image to use.', 'neptunetv' ),
                ]
            );
        }
    }
}
add_action( 'customize_register', 'neptune_customize_register' );
