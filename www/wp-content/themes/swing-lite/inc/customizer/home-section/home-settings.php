<?php
/* Adding header options panel*/
$wp_customize->add_panel( 'swing_lite_home_panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Home Page  Settings', 'swing-lite' ),
    'description'    => esc_html__( 'Customize your awesome site home page settings', 'swing-lite' )
) );

/**
 * Load home page panel file
*/
require $swing_lite_customizer_home_page_options_file_path = swing_lite_file_directory('inc/customizer/home-section/home-options.php');