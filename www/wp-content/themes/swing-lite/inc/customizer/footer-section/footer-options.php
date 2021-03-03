<?php
/* Bottom Footer settings options */
$wp_customize->add_section( 'swing-buttom-footer-section', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Settings', 'swing-lite' )
) );
    
// Footer Top Text
$wp_customize->add_setting('swing_lite_footer_top_text', array( 'sanitize_callback' => 'swing_lite_text_sanitize', 'default' => ''));

$wp_customize->add_control('swing_lite_footer_top_text', array(
    'type' => 'text',
    'label' => esc_html__('Footer Top Text', 'swing-lite'),
    'description' => esc_html__( 'Set the top footer text', 'swing-lite' ),
    'section' => 'swing-buttom-footer-section',
    'settings' => 'swing_lite_footer_top_text'
)); 

// Footer Bototm Text
$wp_customize->add_setting('swing_lite_footer_bottom_text', array( 'default' => '', 'sanitize_callback' => 'swing_lite_text_sanitize' ));
$wp_customize->add_control('swing_lite_footer_bottom_text', array(
    'type' => 'text',
    'label' => esc_html__('Footer Bottom Text', 'swing-lite'),
    'description' => esc_html__( 'Set the bottom footer text', 'swing-lite' ),
    'section' => 'swing-buttom-footer-section',
    'settings' => 'swing_lite_footer_bottom_text'
)); 