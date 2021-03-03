<?php
/* Adding header options panel*/
$wp_customize->add_panel( 'swing-top-header-panel', array(
    'priority'       => 2,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Header Settings', 'swing-lite' ),
    'description'    => esc_html__( 'Customize your awesome site header settings', 'swing-lite' )
) );

/**
 * Load header panel file
*/
require $swing_lite_customizer_header_options_file_path = swing_lite_file_directory('inc/customizer/header-section/header-options.php');