<?php

/* Rooms Section */
$wp_customize->add_section('swing-room-listing-section',array(
    'priority' => 80,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('General Room Listing Section', 'swing-lite')
));

    // Layout 
    $wp_customize->add_setting( 'swing_lite_room_listing_layouts_setting', array(
      'default' => 'grid',
      'sanitize_callback' => 'swing_lite_room_list_radio_sanitize',
    ) );

    $wp_customize->add_control('swing_lite_room_listing_layouts_setting',
     array(
      'type' => 'radio',
      'section' => 'swing-room-listing-section', // Add a default or your own section
        'label' => esc_html__( 'Room Listing Layout Selection', 'swing-lite' ),
        'description' => esc_html__( 'Choose Room Listing Layout', 'swing-lite' ),
          'choices' => array(
            'grid' => esc_html__('Grid', 'swing-lite'),
            'list' =>  esc_html__('List', 'swing-lite')
        
    ), ) ) ;

    // room listing title
    $wp_customize->add_setting('swing_lite_room_listing_main_title_setting',array( 'default' => esc_html__( 'Welcome To Luxuary Room', 'swing-lite' ), 'sanitize_callback' => 'swing_lite_text_sanitize' ));
    $wp_customize->add_control('swing_lite_room_listing_main_title_setting',array(
        'type' => 'text',
        'label' => esc_html__('Room Listing Main Title', 'swing-lite'),
        'description' => esc_html__( 'The Room Listing title will be displayed in the room listing page.', 'swing-lite' ),
        'section' => 'swing-room-listing-section',
        'setting' => 'swing_lite_room_listing_main_title_setting',
    ));

    // room listing sub-title
    $wp_customize->add_setting('swing_lite_room_listing_main_subtitle_setting',array( 'default' => esc_html__( 'Luxury', 'swing-lite' ), 'sanitize_callback' => 'swing_lite_text_sanitize' ));
    $wp_customize->add_control('swing_lite_room_listing_main_subtitle_setting',array(
        'type' => 'text',
        'description' => esc_html__( 'The Room Listing subtitle will be displayed in the room listing page.', 'swing-lite' ),
        'label' => esc_html__('Room Listing Main Subtitle', 'swing-lite'),
        'section' => 'swing-room-listing-section',
        'setting' => 'swing_lite_room_listing_main_subtitle_setting',
    ));