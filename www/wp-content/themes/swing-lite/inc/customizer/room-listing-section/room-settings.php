<?php
/* Adding general blog options panel*/
$wp_customize->add_panel( 'swing-room-listing-panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'General Room Listing Settings', 'swing-lite' ),
    'description'    => esc_html__( 'Customize your awesome site General Room Listing settings', 'swing-lite' )
) );

/**
 * Load General Room Listing panel file
*/
require $swing_lite_customizer_general_room_listing_options_file_path = swing_lite_file_directory('inc/customizer/room-listing-section/room-options.php');