<?php

/* Navigation  sections */
$wp_customize->add_section( 'swing-header-section', array(
    'priority'       => 22,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Header Settings', 'swing-lite' ),
    
) );

    // Layout
    $wp_customize->add_setting( 'swing_lite_header_layouts_setting', array( 'default' => 'layout1', 'sanitize_callback' => 'swing_lite_radio_sanitize' ) );
    $wp_customize->add_control('swing_lite_header_layouts_setting',
     array(
      'type' => 'radio',
      'section' => 'swing-header-section',
      'label' => esc_html__( 'Header Layout', 'swing-lite' ),
      'choices' => array(
        'layout1' => esc_html__('Normal Header ', 'swing-lite'),
        'layout2' => esc_html__('Side Navigation', 'swing-lite'),
        'layout3' => esc_html__('Over Slider', 'swing-lite'),
      ), ) );

    /* Display Top Header */
    $wp_customize->add_setting( 'swing_lite_display_top_header', array( 'default' => 0, 'sanitize_callback' => 'swing_lite_sanitize_checkbox' ) );
    $wp_customize->add_control('swing_lite_display_top_header',array(
        'type' => 'checkbox',
        'label' => esc_html__('Display Top Header', 'swing-lite'),
        'section' => 'swing-header-section',
        'active_callback' => 'swing_lite_header_layout_type',
        'setting' => 'swing_lite_display_top_header',
    ));

    /* Header Contact Section */
    $wp_customize->add_setting( 'swing_lite_header_contact_settings', array( 'default' => esc_html__( 'Contact us directly at +33(0)1 40 41 14 14 (local time: 08:33)', 'swing-lite' ), 'sanitize_callback' => 'swing_lite_text_sanitize' ) );
    $wp_customize->add_control('swing_lite_header_contact_settings',array(
        'type' => 'text',
        'label' => esc_html__('Header Top Contacts', 'swing-lite'),
        'section' => 'swing-header-section',
        'setting' => 'swing_lite_header_contact_settings',
    )); 

    /**
    * Header Top Social tabs
    **/
    $wp_customize->add_setting( 'swing_lite_social_tabs', array(
          'sanitize_callback' => 'swing_lite_sanitize_repeater',
            'transport'         => 'postMessage',
          'default' => json_encode(
            array(
                array(
                    'social_text' => '',
                        'social_icon'    => '',
                        'social_url'    => '',

                  )
            )
          )
      ));
        
    $wp_customize->add_control(  new swing_lite_Repeater_Controler( $wp_customize, 'swing_lite_social_tabs', 
            array(
                'label'   => esc_html__('Social Media Tabs','swing-lite'),
                'section' => 'swing-header-section',
                'swing_lite_box_label' => esc_html__('Tabs','swing-lite'),
                'swing_lite_box_add_control' => esc_html__('Add Tabs','swing-lite'),
                'no_of_options' => 5,
            ),
            array(
                'social_text' => array(
                'type'        => 'text',
                'label'       => esc_html__( 'Social Media Text', 'swing-lite' ),
                'default'     => '',
                'class'       => 'un-bottom-block-cat1'
            ),
                'social_icon' => array(
                'type'        => 'icon',
                'label'       => esc_html__( 'Social Media Icon', 'swing-lite' ),
                'default'     => '',
                'class'       => 'un-bottom-block-cat1'
            ),
            'social_url' => array(
                'type'        => 'url',
                'label'       => esc_html__( 'Social Media URL', 'swing-lite' ),
                'default'     => '',
                'class'       => 'un-bottom-block-cat1'
            )
        )
      ));